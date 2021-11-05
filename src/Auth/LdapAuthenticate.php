<?php
declare(strict_types=1);
/**
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Log\LogTrait;
use Cake\Http\Exception\InternalErrorException;
use ErrorException;
use Cake\ORM\TableRegistry;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\Query;
use Cake\ORM\Locator\TableLocator;



/**
 * LDAP Authentication adapter for AuthComponent.
 *
 * Provides LDAP authentication support for AuthComponent. LDAP will
 * authenticate users against the specified LDAP Server
 *
 * ### Using LDAP auth
 *
 * In your controller's components array, add auth + the required config
 * ```
 *  public $components = [
 *      'Auth' => [
 *          'authenticate' => ['Ldap']
 *      ]
 *  ];
 * ```
 * @property Funcionarios $Funcionarios
 *
 */
class LdapAuthenticate extends BaseAuthenticate
{

    use LogTrait;

    /**
     * LDAP Object
     *
     * @var object
     */
    private $ldapConnection;

    /**
     * Log Errors
     *
     * @var boolean
     */
    public $logErrors = false;
    public $_config;


    /**
     * Constructor
     *
     * @param \Cake\Controller\ComponentRegistry $registry The Component registry used on this request.
     * @param array $this->_config Array of config to use.
     */
    public function __construct(ComponentRegistry $registry, array $config = [])
    {
        parent::__construct($registry, $config);

        $this->_config = Configure::read('Ldap');

        if (!defined('LDAP_OPT_DIAGNOSTIC_MESSAGE')) {
            define('LDAP_OPT_DIAGNOSTIC_MESSAGE', 0x0032);
        }

        if (isset($this->config['host']) && is_object($this->_config['host']) && ($this->_config['host'] instanceof \Closure)) {
            $this->_config['host'] = $this->_config['host']();
        }

        if (empty($this->_config['host'])) {
            throw new InternalErrorException('LDAP Server not specified!');
        }

        if (empty($this->_config['port'])) {
            $this->_config['port'] = null;
        }

        if (isset($this->_config['logErrors']) && $this->_config['logErrors'] === true) {
            $this->logErrors = true;
        }

        try {
            $this->ldapConnection = ldap_connect($this->_config['host'], $this->_config['port']);
            if (isset($this->_config['options']) && is_array($this->_config['options'])) {
                foreach ($this->_config['options'] as $option => $value) {
                    ldap_set_option($this->ldapConnection, $option, $value);
                }
            } else {
                ldap_set_option($this->ldapConnection, LDAP_OPT_NETWORK_TIMEOUT, 5);
            }
        } catch (ErrorException $e) {
            throw new InternalErrorException('Unable to connect to specified LDAP Server(s)!');
        }
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        set_error_handler(
            function ($errorNumber, $errorText, $errorFile, $errorLine) {
                throw new ErrorException($errorText, 0, $errorNumber, $errorFile, $errorLine);
            },
            E_ALL
        );

        try {
            ldap_unbind($this->ldapConnection);
        } catch (ErrorException $e) {
            // Do Nothing
        }
        try {
            ldap_close($this->ldapConnection);
        } catch (ErrorException $e) {
            // Do Nothing
        }

        restore_error_handler();
    }

    /**
     * Authenticate a user based on the request information.
     *
     * @param \Cake\Network\Request $request The request to authenticate with.
     * @param \Cake\Network\Response $response The response to add headers to.
     * @return mixed Either false on failure, or an array of user data on success.
     */
    public function authenticate(ServerRequest $request, Response $response)
    {

        if (empty($request->getData('username')) || empty($request->getData('password'))) {
            return false;
        }

        return $this->_findUser($request->getData('username'), $request->getData('password'));
    }

   /*  public function getUser(ServerRequest $request)
    {
        //$username = env('PHP_AUTH_USER');
        //$password = env('PHP_AUTH_PW');

        if (empty($username) || empty($password)) {
            return false;
        }
        return $this->_findUser($username, $password);
    } */

    /**
     * Find a user record using the username and password provided.
     *
     * @param string $username The username/identifier.
     * @param string|null $password The password
     * @return bool|array Either false on failure, or an array of user data.
     */
    protected function _findUser($username, $password = null)
    {
        if (!empty($this->_config['domain']) && !empty($username) && strpos($username, '@') === false) {
            $username .= '@' . $this->_config['domain'];
        }

        set_error_handler(
            function ($errorNumber, $errorText, $errorFile, $errorLine) {
                throw new ErrorException($errorText, 0, $errorNumber, $errorFile, $errorLine);
            },
            E_ALL
        );


        try {
			$ldapBind = ldap_bind($this->ldapConnection, $username, $password);

            if ($ldapBind === true) {
				$response = null;
				if(is_array($this->_config['baseDN'])){
					foreach ($this->_config['baseDN'] as $key => $value) {
						$searchResults = ldap_search($this->ldapConnection, $value, '(' . $this->_config['search'] . '=' . $username . ')');
						$entry = ldap_first_entry($this->ldapConnection, $searchResults);

						if($entry !== false){
                                $response = ldap_get_attributes($this->ldapConnection, $entry);
						}
					}
				}



				$user = [];
				if(sizeof($response['cedula'])>0){

                    $identification_card = next($response['cedula']);

                    try {
                        //code...
                        $userTable = TableRegistry::get('UsersInternals');
                        $userinternal = $userTable->find()
						->contain(['PublicWorkers','Roles'])
						->where([
                            'PublicWorkers.identification_card' => $identification_card
						])
						->first();


                    } catch (\Throwable $th) {
                        //throw $th;
                        debug($th);exit;
                    }

					if(!is_null($userinternal) && count($userinternal->toArray()) > 0){

                                            foreach ($userinternal->toArray() as $key => $value) {
                                                $user[$key] = $value;
                                            }

                                        }else{
                                            return $user = [];
                                        }
				}

				return $user;
			}
        } catch (ErrorException $e) {
            if ($this->logErrors === true) {
                $this->log($e->getMessage());
            }

            if (ldap_get_option($this->ldapConnection, LDAP_OPT_DIAGNOSTIC_MESSAGE, $extendedError)) {
                if (!empty($extendedError)) {
                    foreach ($this->_config['errors'] as $error => $errorMessage) {
                        if (strpos($extendedError, $error) !== false) {
                            $messages[] = [
                                'message' => $errorMessage,
                                'key' => $this->_config['flash']['key'],
                                'element' => $this->_config['flash']['element'],
                                'params' => $this->_config['flash']['params'],
                            ];
                        }
                    }
                }
            }
        }
        restore_error_handler();

        if (!empty($messages)) {
            $controller = $this->_registry->getController();
            $controller->request->session()->write('Flash.' . $this->_config['flash']['key'], $messages);
        }

        return false;
    }
}
