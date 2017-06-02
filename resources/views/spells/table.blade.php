{{$spells->links()}}

<table style="width:100%"
       class="table table-striped table-hover table-responsive table-condensed">
    <tr>
        <th>Name</th>
        <th>School</th>
        <th>Classes</th>
        <th>Description</th>
    </tr>

    @foreach($spells as $spell)

            <tr id="table-spells-row">
                <td class="spell-cell">
                    <a class="spell-row-link" href="{{ route('spell', $spell->id) }}">
                        {{$spell->name}}
                    </a>
                </td>

                <td class="spell-cell">
                    <a class="spell-row-link" href="{{ route('spell', $spell->id) }}">
                    {{$spell->schools()->select('label')->where('is_elemental', 0)->get()->first()->label}}
                    </a>
                </td>
                <td class="spell-cell">
                    <a class="spell-row-link" href="{{ route('spell', $spell->id) }}">
                    {{$spell->spell_level}}
                    </a>
                </td>
                <td sclass="spell-cell">
                    <a class="spell-row-link" href="{{ route('spell', $spell->id) }}">
                    {{$spell->short_description}}
                    </a>
                </td>
            </tr>

    @endforeach

</table>
{{$spells->links()}}
