<?php

namespace App\Modules\Adm\Http\Controllers;

use App\Modules\Adm\Http\Requests\PaperRequest;
use App\Service\PaperPermissionService;
use App\Service\PaperService;
use App\Service\PermissionService;
use App\Utilities\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaperController extends Controller
{
    /**
     * @var PaperService $paperService
     */
    protected $paperService;

    /**
     * @var PermissionService $permissionService
     */
    protected $permissionService;

    /**
     * @var PaperPermissionService $paperPermissionService
     */
    protected $paperPermissionService;

    /**
     * PaperController constructor.
     * @param PaperService $paperService
     * @param PermissionService $permissionService
     * @param PaperPermissionService $paperPermissionService
     */
    public function __construct(PaperService $paperService, PermissionService $permissionService, PaperPermissionService $paperPermissionService)
    {
        $this->paperService = $paperService;
        $this->permissionService = $permissionService;
        $this->paperPermissionService = $paperPermissionService;
    }

    /**
     * Método responsável pela exibição da lista de papéis
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        can_abort(['adm.view.paper', 'adm.create.paper', 'adm.edit.paper', 'adm.delete.paper']);
        $papers = $this->paperService->all($request);
        return  validatePage($papers) ?? view('adm::paper.index', compact('papers'));
    }

    /**
     * Método responsável pela exibição do papel de acordo o id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {
        can_abort(['adm.view.paper', 'adm.create.paper', 'adm.edit.paper', 'adm.delete.paper']);

        $paperPermission = $this->paperService->paperPermission($id);
        $papers = $this->paperService->allWithoutPaginateFilter();
        if (empty($paperPermission['paper'])) {
            return redirect('adm.paper');
        }

        return view('adm::paper.show', compact('paperPermission', 'papers'));
    }

    /**
     * Método responsável pela exibição da view de criação de um papel
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        can_abort(['adm.create.paper']);
        $permissions = $this->permissionService->all();

        foreach ($permissions as $p) {
            if (!empty($p['nmareapermissao'])) {
                $areaPermissions[$p['nmareapermissao']][] = $p;
            }
        }
        ksort($areaPermissions);
        $areaPermissions = array_chunk($areaPermissions, 4);

        return view('adm::paper.create', compact('areaPermissions'));
    }

    /**
     * Método responsável pela criação de um papel
     *
     * @param PaperRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PaperRequest $request)
    {
        can_abort(['adm.create.paper']);
        $response = $this->paperService->create($request->all());
        if ($response['status'] == Status::SUCCESS) {
            return redirect(route('adm.paper.show', encrypt_url($response['paper']->idpapel)));
        }

        return redirect()->back()->with('message', $response['message'])->withInput($request->all());
    }

    /**
     * Método responsável pela exibição da view de edição de um papel
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        can_abort(['adm.edit.paper']);
        $paperPermission = $this->paperService->paperPermission($id);
        $permissions = $this->permissionService->all();
        $papers = $this->paperService->allWithoutPaginateFilter();

        foreach ($permissions as $p) {
            if (!empty($p['nmareapermissao'])) {
                $areaPermissions[$p['nmareapermissao']][] = $p;
            }
        }
        ksort($areaPermissions);
        $areaPermissions = array_chunk($areaPermissions, 4);

        return view('adm::paper.edit', compact('paperPermission', 'areaPermissions', 'papers'));
    }

    /**
     * Método responsável pela edição de um papel
     * @param $id
     * @param PaperRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, PaperRequest $request)
    {
        can_abort(['adm.edit.paper']);
        $response = $this->paperService->update($id, $request->all());

        if ($response['status'] == Status::SUCCESS) {
            return redirect(route('adm.paper.show', encrypt_url($id)));
        }
        return redirect()->back()->with('message', $response['message'])->withInput($request->all());
    }
}
