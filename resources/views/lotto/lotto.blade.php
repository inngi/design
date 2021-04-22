record: 
<br>
<table>
    <tbody>
@foreach ($lottofreq as $item)
{{-- {{ dd($item) }} --}}
<tr>
    <td>{{ $item['number1'] }}</td><td>{{ $item['number2'] }}</td><td>{{ $item['number3'] }}</td><td>{{ $item['number4'] }}</td><td>{{ $item['number5'] }}</td><td>{{ $item['number6'] }}</td><td>{{ $item['number7'] }}</td><td>{{ $item['number8'] }}</td><td>{{ $item['number9'] }}</td><td>{{ $item['number10'] }}</td><td>{{ $item['number11'] }}</td><td>{{ $item['number12'] }}</td><td>{{ $item['number13'] }}</td><td>{{ $item['number14'] }}</td><td>{{ $item['number15'] }}</td><td>{{ $item['number16'] }}</td><td>{{ $item['number17'] }}</td><td>{{ $item['number18'] }}</td><td>{{ $item['number19'] }}</td><td>{{ $item['number20'] }}</td><td>{{ $item['number21'] }}</td><td>{{ $item['number22'] }}</td><td>{{ $item['number23'] }}</td><td>{{ $item['number24'] }}</td><td>{{ $item['number25'] }}</td><td>{{ $item['number26'] }}</td><td>{{ $item['number27'] }}</td><td>{{ $item['number28'] }}</td><td>{{ $item['number29'] }}</td><td>{{ $item['number30'] }}</td><td>{{ $item['number31'] }}</td><td>{{ $item['number32'] }}</td><td>{{ $item['number33'] }}</td><td>{{ $item['number34'] }}</td><td>{{ $item['number35'] }}</td><td>{{ $item['number36'] }}</td><td>{{ $item['number37'] }}</td><td>{{ $item['number38'] }}</td><td>{{ $item['number39'] }}</td><td>{{ $item['number40'] }}</td><td>{{ $item['number41'] }}</td><td>{{ $item['number42'] }}</td><td>{{ $item['number43'] }}</td><td>{{ $item['number44'] }}</td><td>{{ $item['number45'] }}</td>
</tr>


@endforeach
</tbody>
</table>
<?php 
// for($i=1; $i<46; $i++){
//     echo htmlspecialchars('<td>{{ $item[\'number'.$i.'\'] }}</td>');
// }
?>