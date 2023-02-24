    <table class="table spreadsheet-table">
        <thead>
            <tr class="sticky">
                @php 
                    $detailHeader = ['Analysis' , 'Recommended Buys'];
                    $linkHeader = ['event-link' , 'vivid-link'];    
                @endphp
                
                @foreach($header as $index => $item)
                   @php if(in_array($item , $linkHeader)) continue; @endphp
                   <th @if(in_array($item , $detailHeader)) class="wide-width-header" @endif >{{$item}}</th>
                    
                @endforeach
            </tr>
        </thead>
        <tbody>
           
            @foreach($rows as $key => $row)
            {{-- {{dd($row)}} --}}
            @php $row = array_values($row)  @endphp
            {{-- {{dd($row[6])}} --}}
            <tr >
                <td>{{$row[0]}}</td>
                <td >{{$row[1]}}</td>
                <td >{{$row[2]}}</td>
                <td class="spread-sheet-link"><a href="{{$row[4]}}" target="_blank" >{{$row[3]}}</a></td>
                <td >{{$row[5]}}</td>
                <td >{{$row[6]}}</td>
                <td class="spread-sheet-link"><a href="{{$row[8]}}" target="_blank" >{{$row[7]}}</a></td>
                <td >{{$row[9]}}</td>
                <td >{{$row[10]}}</td>
                <td >{{$row[11]}}</td>
                <td >{{$row[12]}}</td>
                <td >{{$row[13]}}</td>
                {{-- @foreach($row as $item)
                
                    <td >{{$item}}</td>
                   
                @endforeach --}}
            </tr>
            @endforeach
        </tbody>
    </table>
            