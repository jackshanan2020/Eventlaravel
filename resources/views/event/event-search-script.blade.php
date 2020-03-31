
<script>
    $(function() {
        var cardTitle = $('#card_title');
        var familiesTable = $('#families_table');
        var resultsContainer = $('#search_results');
        var familiesCount = $('#family_count');
        var clearSearchTrigger = $('.clear-search');
        var searchform = $('#search-events');
        var searchformInput = $('#family_search_box');
        var familyPagination = $('#family_pagination');
        var searchSubmit = $('#family_trigger');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        searchform.submit(function(e) {
            e.preventDefault();
            resultsContainer.html('');
            familiesTable.hide();
            clearSearchTrigger.show();
            let noResulsHtml = '<tr>' +
                                '<td>{!! trans("familymanagement.search.no-results") !!}</td>' +
                                '<td></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-xs"></td>' +
                                '<td class="hidden-sm hidden-xs"></td>' +
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                '<td class="hidden-sm hidden-xs hidden-md"></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '</tr>';

            $.ajax({
                type:'POST',
                url: "{{ route('search-events') }}",
                data: searchform.serialize(),
                success: function (result) {
                    console.log(result);
                    // console.log(result[0][0]['searchable']);
                    // console.log(result);
                    // let jsonData = JSON.parse(result);
                    // console.log(jsonData);
                    if (result[0].length != 0) {
                        var count = 0;
                        $.each(result[0], function(index, val) {
                           console.log(val['searchable'].id);
                            let showCellHtml = '<a class="btn btn-sm btn-success btn-block" href="/families/' + val['searchable'].id + '" data-toggle="tooltip" title="{{ trans("familymanagement.tooltips.show") }}">{!! trans("familymanagement.buttons.show") !!}</a>';
                            let editCellHtml = '<a class="btn btn-sm btn-info btn-block" href="/families/' + val['searchable'].id + '/edit" data-toggle="tooltip" title="{{ trans("familymanagement.tooltips.edit") }}">{!! trans("familymanagement.buttons.edit") !!}</a>';
                            let assetCellHtml = '<a class="btn btn-sm btn-info btn-block" href="/families/' + val['searchable'].id + '/family-forms" data-toggle="tooltip" title="Assets">{!! trans("familymanagement.buttons.show-assets") !!}</a>';
                            let memberCellHtml = '<a class="btn btn-sm btn-info btn-block" href="/families/' + val['searchable'].id + '/members" data-toggle="tooltip" title="Members">{!! trans("familymanagement.buttons.show-members") !!}</a>';                           
                            let subsidyCellHtml = '<a class="btn btn-sm btn-info btn-block" href="/families/' + val['searchable'].id + '/subsidies" data-toggle="tooltip" title="Subsidies">{!! trans("familymanagement.buttons.show-reliefs") !!}</a>';                             
                            let deleteCellHtml = '<form method="POST" action="/families/'+ val['searchable'].id + '" accept-charset="UTF-8" data-toggle="tooltip" title="Delete">' +
                                    '{!! Form::hidden("_method", "DELETE") !!}' +
                                    '{!! csrf_field() !!}' +
                                    '<button class="btn btn-danger btn-sm" type="button" style="width: 100%;" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="{!! trans("familymanagement.modals.delete_user_message", ["family" => "'+val['searchable'].fam_lead_first_name+'"]) !!}">' +
                                        '{!! trans("familymanagement.buttons.delete") !!}' +
                                    '</button>' +
                                '</form>';

                                if(val['searchable'].approve=='2'){
                                count++
                                resultsContainer.append('<tr>' +
                                '<td>' + val['searchable'].id + '</td>' +
                                '<td>' + val['searchable'].fam_lead_first_name + '</td>' +
                                '<td class="hidden-xs">' + val['searchable'].fam_lead_last_name + '</td>' +
                                '<td class="hidden-xs">' + val['searchable'].fam_lead_tp_no + '</td>' +
                                '<td>' + deleteCellHtml + '</td>' +
                                '<td>' + showCellHtml + '</td>' +
                                '<td>' + editCellHtml + '</td>' +
                                '<td>' + assetCellHtml + '</td>' +
                                '<td>' + memberCellHtml + '</td>' +
                                '<td>' + subsidyCellHtml + '</td>' +
                                '</tr>');
                            
                          
                                }
                        });
                    } else {
                        resultsContainer.append(noResulsHtml);
                    };
                    familiesCount.html(count + " {!! trans('familymanagement.search.found-footer') !!}");
                    familyPagination.hide();
                    cardTitle.html("{!! trans('familymanagement.search.title') !!}");
                },
                error: function (response, status, error) {
                    if (response.status === 422) {
                        resultsContainer.append(noResulsHtml);
                        familiesCount.html(0 + " {!! trans('familymanagement.search.found-footer') !!}");
                        familyPagination.hide();
                        cardTitle.html("{!! trans('familymanagement.search.title') !!}");
                    };
                },
            });
        });
        searchSubmit.click(function(event) {
            event.preventDefault();
            searchform.submit();
        });
        searchformInput.keyup(function(event) {
            if ($('#family_search_box').val() != '') {
                clearSearchTrigger.show();
            } else {
                clearSearchTrigger.hide();
                resultsContainer.html('');
                familiesTable.show();
                cardTitle.html("{!! trans('familymanagement.showing-all-users') !!}");
                familyPagination.show();
                familiesCount.html(" ");
            };
        });
        clearSearchTrigger.click(function(e) {
            e.preventDefault();
            clearSearchTrigger.hide();
            familiesTable.show();
            resultsContainer.html('');
            searchformInput.val('');
            cardTitle.html("{!! trans('familymanagement.showing-all-users') !!}");
            familyPagination.show();
            familiesCount.html(" ");
        });
    });
</script>
