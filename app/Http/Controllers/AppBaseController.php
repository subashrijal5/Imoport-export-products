<?php

namespace App\Http\Controllers;

use App\Helpers\FunctionHelper;
use App\Models\DBNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use InfyOm\Generator\Utils\ResponseUtil;
use Laracasts\Flash\Flash;
use Throwable;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public $entity;
    public $repository;


    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->repository->find($id);

        if (empty($category)) {
            Flash::error($this->entity['singular'] . ' not found');

            return redirect(route($this->entity['url'] . '.index'));
        }

        $this->repository->delete($id);

        Flash::success($this->entity['singular'] . ' deleted successfully.');

        return redirect(route($this->entity['url'] . '.index'));
    }

    /**
     * Remove the specified Model from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function deleted($id)
    {
        $record = $this->repository->find($id, ['*'], true);

        if (empty($record)) {
            Flash::error($this->entity['singular'] . ' not found');
            return redirect(route($this->entity['url'] . '.index'));
        }

        $record->is_deleted = 1;
        $record->save();

        $this->repository->delete($id);

        Flash::success($this->entity['singular'] . ' deleted successfully.');

        return redirect(route($this->entity['url'] . '.index'));
    }

    /**
     * Archive the specified Model from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroyAjax($id)
    {
        $record = $this->repository->find($id);

        if (empty($record)) {
            return $this->sendError($this->entity['view'] . ' not found');
        }

        $this->repository->delete($id);

        return $this->sendResponse($record, $this->entity['view'] . ' archived successfully.');
    }

    /**
     * Delete the specified Model from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function deletedAjax($id)
    {
        $record = $this->repository->find($id, ['*'], true);

        if (empty($record)) {
            return $this->sendError($this->entity['view'] . ' not found');
        }

        $record->is_deleted = 1;
        $record->save();

        $this->repository->delete($id);

        return $this->sendResponse($record, $this->entity['view'] . ' deleted successfully.');
    }

    /**
     * updateDestroy the specified Model in storage.
     *
     * @param  int              $id
     * @param Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function updateDestroy($id, Request $request)
    {
        $record = $this->repository->find($id, ['*'], true);
        $message = '';
        // dd($this->entity);
        if (empty($record)) {
            return $this->sendError($this->entity['view'] . ' not found');
        }

        try {
            switch ($request->method()) {
                case 'PATCH':
                    if ($request->get('process', null) == 'restore') {
                        if ($this->entity['view'] == 'employer_jobs') {
                            $message = 'Activate';
                        } else {
                            $message = 'Activate';
                        }
                        $record = $this->repository->restore($id);
                    } else {
                        $input = $request->only('status');
                        $message = 'status updated';
                        $record = $this->repository->update($input, $id);
                    }
                    break;
                case 'DELETE':
                    if ($request->get('process', null) == 'archive') {
                        if ($this->entity['view'] == 'employer_jobs') {
                            $message = 'Deactivate';
                        } else {
                            $message = 'Deactivate';
                        }
                    } else {
                        $message = 'Deleted';
                        $record->is_deleted = 1;
                        $record->save();
                    }
                    $this->repository->delete($id);
                    break;
                default:
                    return $this->sendError('Invalid method used, only Patch or Delete allowed.', 400);
                    break;
            }
            return $this->sendResponse($record, $this->entity['singular'] . " $message successfully.");
        } catch (Throwable $e) {
            return $this->sendError($e->getMessage(), $e->getCode() == 0 ? 400 : $e->getCode());
        }
    }
}
