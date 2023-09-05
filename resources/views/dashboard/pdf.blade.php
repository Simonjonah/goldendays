<!DOCTYPE html>
<html>
<head>
    <title>Brixtonn Terminal Result</title>
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
</head>
<style>
    table{
    width:200px;
    height:auto;
    table-layout:fixed;
}
</style>
<body>
  
  
    <table class="table table-bordered">

        <tr>
            <th style="width:783px; height:18px; border:1px solid black;">Test</th>
            <th style="width:783px; height:18px; border:1px solid black;">Exams</th>
            <th style="width:783px; height:18px; border:1px solid black;">Total</th>
            <th style="width:783px; height:18px; border:1px solid black;">Grade</th>
        </tr>
        @foreach($getyour_results as $getyour_result)
        <tr>
            <td>{{ $getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 }}</td>
            <td>{{ $getyour_result->exams }}</td>
            <td>{{ $getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams }}</td>
            <td>@if ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 69)
                <p>A</p>
               
                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 59)
                <p>B</p>
                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 49)
                <p>c</p>
                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 44)
                <p>D</p>
                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 40)
                <p>E</p>
                @elseif ($getyour_result->test_1 + $getyour_result->test_2 + $getyour_result->test_3 + $getyour_result->exams > 39)
                <p>F</p>
                @else
                <p>F</p>
              @endif</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>