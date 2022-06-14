<?php

namespace App\Http\Controllers;

use App\Helpers\GenerateArray;
use App\Services\Arrays\SorterFactory;
use App\Services\Writers\WriterFactory;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    use ValidatesRequests;

    public function render(Request $request)
    {
        try {
            $request->validate([
                'sizeArray' => 'required|integer|min:2|max:20',
                'kindSort' => 'required',
                'action' => 'required',
            ]);
            [$diffArray, $inputArray] = (new GenerateArray($request->sizeArray))->generateArray();

            $sorter = (new SorterFactory($request->kindSort))->createProduct();
            $sorter->sortArray(
                $request->sizeArray,
                $diffArray
            );

            $outputArray = $sorter->getOutputArray();

            $writer = (new WriterFactory($request->action))->createProduct();
            $response = $writer->writeArray(
                $outputArray,
                $request->sizeArray,
                $inputArray,
                $request->kindSort
            );

            (is_string($response))
                ? response(Storage::download($response)->sendContent())
                : response($response)->sendContent();

        } catch (Exception $exception) {
            response(
                [
                    "message" => $exception->getMessage(),
                    "status" => $exception->getCode()?:400,
                ]
            )->sendContent();
        }
    }
}
