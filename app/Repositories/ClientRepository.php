<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version October 31, 2021, 7:11 am UTC
 */

class ClientRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Client::class;
    }
}
