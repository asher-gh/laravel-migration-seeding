<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;

class CalculatorController extends Controller
{
    function show()
    {
        return view('calculator.calculator', ['result' => 0]);
    }

    function calculate(CalculatorRequest $request)
    {
        $params = $request->validated();

            $n1 = $params['num1'];
            $n2 = $params['num2'];
            $op = $params['operation'];

            switch ($op)  {
        case '+':
            $res = $n1 + $n2;
            break;
        case '-':
            $res = $n1 - $n2;
            break;
        case '*':
            $res = $n1 * $n2;
            break;
        case '/':
            $res = ($n1==0 || $n2==0) ? 999:fdiv($n1, $n2);
            break;
        default:
            $res = 0;
            }

            // perform calculation
            // $res = $params['num1'] + $params['num2'];

            return view(
                'calculator.calculator', [
                'result' => $res
                ]
            );

        //
    }
}
