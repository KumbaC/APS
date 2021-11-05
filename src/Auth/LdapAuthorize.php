<?php
declare(strict_types=1);

namespace App\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Http\ServerRequest;




class LdapAuthorize extends BaseAuthorize
{
    public function authorize($user, ServerRequest $request): bool
    {
        $this->Auth->setConfig('authorize', [
            'Ldap', // app authorize object.
            'AuthBag.Combo', // plugin authorize object.

        ]);
        $this->Auth->allow(['logout', 'login']);

        return false;
    }

}
