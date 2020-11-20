<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if ($this->isModel($e)) {
            return $this->ModelException();
        }
        if ($this->isHttp($e)) {
            return $this->HttpException();
        }
        return parent::render($request, $e);
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function ModelException()
    {
        return response()->json(['errors' => "Model not found!"], Response::HTTP_NOT_FOUND);
    }

    protected function HttpException()
    {
        return response()->json(['errors' => "Incorect Route!"], Response::HTTP_NOT_FOUND);
    }
}
