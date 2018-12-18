<?php

namespace App\Http\Controllers\Backend\Hello;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Hello\CreateHello;
use App\Http\Requests\Backend\Hello\UpdateHello;
use App\Repositories\Backend\HelloRepository;
use App\Events\Backend\Hello\HelloCreated;
use App\Events\Backend\Hello\HelloUpdated;
use App\Events\Backend\Hello\HelloDeleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Hello;

class HelloController extends Controller
{
    /** @var $helloRepository */
    private $helloRepository;

    public function __construct(HelloRepository $helloRepo)
    {
        $this->helloRepository = $helloRepo;
    }

    /**
     * Display a listing of the Hello.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->helloRepository->pushCriteria(new RequestCriteria($request));
        $data = $this->helloRepository->paginate(25);

        return view('backend.helloes.index')->with('helloes', $data);
    }

    /**
     * Show the form for creating a new Hello.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        return view('backend.helloes.create');
    }

    /**
     * Store a newly created Hello in storage.
     *
     * @param CreateHello $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateHello $request)
    {
        $obj = $this->helloRepository->create($request->only([]));

        event(new HelloCreated($obj));
        return redirect()
            ->route('admin.hello.index')
            ->withFlashSuccess(__('alerts.frontend.hello.saved'));
    }

    /**
     * Display the specified Hello.
     *
     * @param Hello $hello
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Hello $hello)
    {
        return view('backend.helloes.show')->with('hello', $hello);
    }

    /**
     * Show the form for editing the specified Hello.
     *
     * @param Hello $hello
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Hello $hello)
    {
        return view('backend.helloes.edit')->with('hello', $hello);
    }

    /**
     * Update the specified Hello in storage.
     *
     * @param UpdateHello $request
     *
     * @param Hello $hello
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateHello $request, Hello $hello)
    {
        $obj = $this->helloRepository->update($hello, $request->all());

        event(new HelloUpdated($obj));
        return redirect()
            ->route('admin.hello.index')
            ->withFlashSuccess(__('alerts.frontend.hello.updated'));
    }

    /**
     * Remove the specified Hello from storage.
     *
     * @param Hello $hello
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Hello $hello)
    {
        $obj = $this->helloRepository->delete($hello);
        event(new HelloDeleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.hello.deleted'));
    }
}
