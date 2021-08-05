<?php

declare(strict_types=1);
namespace App\Tenant;


use App\Models\User;

class TenantManager
{
    /**
     * @return mixed
     * posso retornar valores nulos ou Users
     */
    private $tenant;

    public function getTenant(): ?User
    {
        return $this->tenant;
    }

    /**
     * @param mixed $tenant
     */
    public function setTenant($tenant): void
    {
        $this->tenant = $tenant;
    }
}
