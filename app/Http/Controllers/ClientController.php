<?php
namespace App\Http\Controllers;

use App\Exports\CommonExport;
use App\Http\Requests\ClientCreateRequest;
use App\Repositories\ClientRepository;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends AppBaseController
{
    public $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * ClientController@index
     *
     * @return void
     */
    public function index()
    {
        $clients = $this->repository->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $client = $this->repository->create($request->all());
            toastr()->success('Data has been saved successfully!');
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
            toastr()->error($th->getMessage());
            return redirect()->back();
        }
    }

    public function export()
    {
        try {
            return Excel::download(new CommonExport('Client'), 'clients.csv');
        } catch (\Throwable $th) {
            toastr()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
