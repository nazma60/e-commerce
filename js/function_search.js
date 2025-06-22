window.onload=function() {
    new Ajax.Autocompleter("name", "autocomplete_choices", base_url + "application/ajaxsearch/", ());
    $('function_search_form').onsubmit=funcion(){
        inline_results();
        return false;
    }
}
function inline_results(){
    new Ajax.updater('description',base_url+'application/ajaxsearch',( method :'post',postBody:'description=true&name='+$F('name')));
    new Effect.Appear('description');

}


