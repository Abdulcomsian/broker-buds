    <table class="table">
        <thead>
            <tr class="sticky">
                @foreach($header as $item)
                    <th scope="col">{{$item}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
            <tr @if($loop->iteration == 1) class="sticky" @endif>
                @foreach($row as $item)
                    <td>{{$item}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
            