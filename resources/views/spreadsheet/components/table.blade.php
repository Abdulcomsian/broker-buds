    <table class="table">
        <thead>
            <tr class="sticky">
            @php $i=1; @endphp
                @foreach($header as $item)
                    <th @if($i == 10 || $i == 11)  class="test" @endif scope="col">{{$item}}</th>
                    @php $i++; @endphp
                @endforeach
            </tr>
        </thead>
        <tbody>
            
            @foreach($rows as $row)
            <tr >
                
                @foreach($row as $item)
                    <td >{{$item}}</td>
                   
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
            