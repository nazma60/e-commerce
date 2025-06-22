<!DOCTYPE html>
<html>
<head>
    <title>Multiple email</title>
    <!-- Jquery Packages -->

    <link rel="stylesheet" href="<?php echo base_url('css/autocomplete/jquery-ui.css') ?>" />


    <script src="<?php echo base_url('css/autocomplete/jquery-1.8.3.js') ?>"></script>
    <script src="<?php echo base_url('css/autocomplete/jquery-ui.js')?>"></script>

    <!-- Jquery Package End -->
    <style>
        #txtinput{width:400px;height: 30px;border-radius:8px;border:1px solid #999;}
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            function split( val ) {
                return val.split( /,\s*/ );
            }
            function extractLast( term ) {
                return split( term ).pop();
            }

            $( "#txtinput" )
                // don't navigate away from the field on tab when selecting an item
                .bind( "keydown", function( event ) {
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).data( "autocomplete" ).menu.active ) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    source: function( request, response ) {
                        $.getJSON( "<?php echo base_url();?>autocomplete_c/getUserEmail",{
                            term: extractLast( request.term )
                        },response );
                    },
                    search: function() {
                        // custom minLength
                        var term = extractLast( this.value );
                        if ( term.length < 1 ) {
                            return false;
                        }
                    },
                    focus: function() {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function( event, ui ) {
                        var terms = split( this.value );
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push( ui.item.value );
                        // add placeholder to get the comma-and-space at the end
                        terms.push( "" );
                        this.value = terms.join( "" );
                        return false;
                    }
                });

        });

    </script>
</head>
<body>
<!-- Your Input Text Box-->
<input type="text" id="txtinput" size="20" />


</body>
</html>