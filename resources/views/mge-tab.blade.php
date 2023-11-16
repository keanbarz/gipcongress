<x-app-layout>

    <style>/*Table Styles*/
        /* Define styles for the table */
        table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        border: 1px solid #ddd; /* Add border to the entire table */
        }

        /* Style table headers */
        th {
        
        border: 1px solid #ddd; /* Add border to table header cells */
        }

        /* Style table data cells 
        td {
        border: 1px solid #ddd;   //Add border to table data cells 
        padding: 8px;
        text-align: left;
        }*/

        /* Add some hover effect to table rows */
        tr:hover {
        background-color: blue;
        }
    </style>
    <style>/*Buttons*/
        .dropbtn {
            background-color: green;
            color: white;
            min-width: 80px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            }
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>/*Show Tables */
        function showInput(trId) {
            $('#update_table').show();
            $('tr').hide();
            $('#truphead').show();
            $('#truphead0').show();
            $('#truphead1').show();
            $('#trmhead').show();
            $('#trmhead1').show();
            for (var i=1; i < 8; i++){
            $('#trmhead2' + i).show();}
            $('#' + trId).show(); // Show the selected input
           
        }
    </script>

    @if (Auth::user()->contest === 'all' || Auth::user()->contest === 'mge')
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9" id="update_table" style="display:none">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                    <table>
                        <thead>
                            <tr id="truphead">
                                <th colspan="2" style="padding: 10px; min-width: unset;">CRITERIA</th>
                                @if (Auth::user()->role === 'admin')
                                <th colspan="3" style="padding: 10px; min-width: unset;">CONTENT AND RELEVANCE (60%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">CREATIVITY (40%)</th>
                                @else
                                <th colspan="1" style="padding: 10px; min-width: unset;">CONTENT AND RELEVANCE (60%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">CREATIVITY (40%)</th>
                                @endif
                            </tr>
                        </thead>
                        <thead>
                            <tr id="truphead1">
                                <th style="padding: 10px; min-width: unset;">Action</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                @if (Auth::user()->role === 'admin')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @elseif (Auth::user()->role === 'judge1')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                @elseif (Auth::user()->role === 'judge2')
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                @elseif (Auth::user()->role === 'judge3')
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scoresud as $scoreud)
                            <tr id="{{ $scoreud->id }}" style="display:none">
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                    <form method="post" action="/tabulate/mge/save/{{ $scoreud ->id }}">@csrf
                                        @if (Auth::user()->status === 'open')
                                            <button type="submit" class="dropbtn">Save</button>
                                        @else {{ __('TALLY CLOSED') }}
                                        @endif
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreud->office }}</td>
                                    @if (Auth::user()->role === 'admin')
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="carj1" value="{{ $scoreud->carj1 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="carj2" value="{{ $scoreud->carj2 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="carj3" value="{{ $scoreud->carj3 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="crj1" value="{{ $scoreud->crj1 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="crj2" value="{{ $scoreud->crj2 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="crj3" value="{{ $scoreud->crj3 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    @elseif (Auth::user()->role === 'judge1')
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="carj1" value="{{ $scoreud->carj1 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="crj1" value="{{ $scoreud->crj1 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    @elseif (Auth::user()->role === 'judge2')
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="carj2" value="{{ $scoreud->carj2 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="crj2" value="{{ $scoreud->crj2 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    @elseif (Auth::user()->role === 'judge1')
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="carj3" value="{{ $scoreud->carj3 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="10" type="text" name="crj3" value="{{ $scoreud->crj3 }}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                    @endif
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </br>
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                    <table>
                        <thead>
                            <tr id="truphead0">
                                <th colspan="8" style="padding: 10px; min-width: unset;">MY GIP EXPERIENCE</th>
                            </tr>
                            <tr id="trmhead">
                                <th colspan="2" style="padding: 10px; min-width: unset;">CRITERIA</th>
                                @if (Auth::user()->role === 'admin')
                                <th colspan="3" style="padding: 10px; min-width: unset;">CONTENT AND RELEVANCE (60%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">CREATIVITY (40%)</th>
                                @else
                                <th colspan="1" style="padding: 10px; min-width: unset;">CONTENT AND RELEVANCE (60%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">CREATIVITY (40%)</th>
                                @endif
                            </tr>
                        </thead>
                        <thead>
                            <tr id="trmhead1">
                                <th style="padding: 10px; min-width: unset;">Action</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                @if (Auth::user()->role === 'admin')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @elseif (Auth::user()->role === 'judge1')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                @elseif (Auth::user()->role === 'judge2')
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                @elseif (Auth::user()->role === 'judge3')
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scores as $score)
                            <tr id="trmhead2{{ $score->id }}">
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                    @if (Auth::user()->status === 'open')
                                        <button onclick="showInput('{{ $score->id }}')" class="dropbtn" >Update</button>
                                    @else {{ __('TALLY CLOSED') }}
                                    @endif
                                </td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->office }}</td>
                                @if (Auth::user()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->carj1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->carj2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->carj3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->crj1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->crj2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->crj3 }}</td>
                                @elseif (Auth::user()->role === 'judge1')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->carj1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->crj1 }}</td>
                                @elseif (Auth::user()->role === 'judge2')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->carj2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->crj2 }}</td>
                                @elseif (Auth::user()->role === 'judge3')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->carj3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $score->crj3 }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                    <p style="text-align: center;">ACCESS DENIED<p>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
