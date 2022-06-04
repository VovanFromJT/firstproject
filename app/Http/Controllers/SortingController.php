<?php

namespace App\Http\Controllers;

use App\Helpers\GenerateArray;
use App\Models\Arrays\SorterFactory;
use App\Models\Writers\WriterFactory;
use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SortingController extends Controller
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

            $generateArray = new GenerateArray($request->sizeArray);
            [$diffArray, $inputArray] = $generateArray->generateArray();

            $sorterFactory = new SorterFactory($request->kindSort);
            $sorter = $sorterFactory->createProduct();

            $writeFactory = new WriterFactory($request->action);
            $writer = $writeFactory->createProduct();

            $sorter->sortArray($request->sizeArray, $diffArray);
            $sorter->callOutput($writer, $inputArray);
        } catch (Exception $exception) {
            response(
                [
                    "name" => "",
                    "outputArray" => [],
                    "message" => $exception->getMessage(),
                ],
                500
            )->sendContent();
        }
    }
}
