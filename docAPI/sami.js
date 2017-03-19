
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">CSDT</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR3" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR3.html">CSR3</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:CSDT_CSR3_Abstracts" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR3/Abstracts.html">Abstracts</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR3_Abstracts_AbstractCSR3DTO" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="CSDT/CSR3/Abstracts/AbstractCSR3DTO.html">AbstractCSR3DTO</a>                    </div>                </li>                            <li data-name="class:CSDT_CSR3_Abstracts_AbstractCSR3PropertyDTO" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="CSDT/CSR3/Abstracts/AbstractCSR3PropertyDTO.html">AbstractCSR3PropertyDTO</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR3_Interfaces" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR3/Interfaces.html">Interfaces</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR3_Interfaces_CSR3DTOInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="CSDT/CSR3/Interfaces/CSR3DTOInterface.html">CSR3DTOInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:CSDT_CSR3_Traits" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="CSDT/CSR3/Traits.html">Traits</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:CSDT_CSR3_Traits_CSR3DTOTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="CSDT/CSR3/Traits/CSR3DTOTrait.html">CSR3DTOTrait</a>                    </div>                </li>                            <li data-name="class:CSDT_CSR3_Traits_CSR3PropertyDTOTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html">CSR3PropertyDTOTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:CSDT_CSR3_CSR3GenericDTO" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="CSDT/CSR3/CSR3GenericDTO.html">CSR3GenericDTO</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "CSDT.html", "name": "CSDT", "doc": "Namespace CSDT"},{"type": "Namespace", "link": "CSDT/CSR3.html", "name": "CSDT\\CSR3", "doc": "Namespace CSDT\\CSR3"},{"type": "Namespace", "link": "CSDT/CSR3/Abstracts.html", "name": "CSDT\\CSR3\\Abstracts", "doc": "Namespace CSDT\\CSR3\\Abstracts"},{"type": "Namespace", "link": "CSDT/CSR3/Interfaces.html", "name": "CSDT\\CSR3\\Interfaces", "doc": "Namespace CSDT\\CSR3\\Interfaces"},{"type": "Namespace", "link": "CSDT/CSR3/Traits.html", "name": "CSDT\\CSR3\\Traits", "doc": "Namespace CSDT\\CSR3\\Traits"},
            {"type": "Interface", "fromName": "CSDT\\CSR3\\Interfaces", "fromLink": "CSDT/CSR3/Interfaces.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "doc": "&quot;CSR3DTOInterface&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "fromLink": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html#method_setAttribute", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface::setAttribute", "doc": "&quot;Set attribute&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "fromLink": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html#method_getAttribute", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface::getAttribute", "doc": "&quot;Get attribute&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "fromLink": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html#method_setAttributes", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface::setAttributes", "doc": "&quot;Set attributes&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "fromLink": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html#method_getAttributes", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface::getAttributes", "doc": "&quot;Get attributes&quot;"},
            
            
            {"type": "Class", "fromName": "CSDT\\CSR3\\Abstracts", "fromLink": "CSDT/CSR3/Abstracts.html", "link": "CSDT/CSR3/Abstracts/AbstractCSR3DTO.html", "name": "CSDT\\CSR3\\Abstracts\\AbstractCSR3DTO", "doc": "&quot;AbstractCSR3DTO.php&quot;"},
                    
            {"type": "Class", "fromName": "CSDT\\CSR3\\Abstracts", "fromLink": "CSDT/CSR3/Abstracts.html", "link": "CSDT/CSR3/Abstracts/AbstractCSR3PropertyDTO.html", "name": "CSDT\\CSR3\\Abstracts\\AbstractCSR3PropertyDTO", "doc": "&quot;AbstractCSR3PropertyDTO.php&quot;"},
                    
            {"type": "Class", "fromName": "CSDT\\CSR3", "fromLink": "CSDT/CSR3.html", "link": "CSDT/CSR3/CSR3GenericDTO.html", "name": "CSDT\\CSR3\\CSR3GenericDTO", "doc": "&quot;CSR3GenericDTO.php&quot;"},
                    
            {"type": "Class", "fromName": "CSDT\\CSR3\\Interfaces", "fromLink": "CSDT/CSR3/Interfaces.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "doc": "&quot;CSR3DTOInterface&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "fromLink": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html#method_setAttribute", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface::setAttribute", "doc": "&quot;Set attribute&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "fromLink": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html#method_getAttribute", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface::getAttribute", "doc": "&quot;Get attribute&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "fromLink": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html#method_setAttributes", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface::setAttributes", "doc": "&quot;Set attributes&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface", "fromLink": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html", "link": "CSDT/CSR3/Interfaces/CSR3DTOInterface.html#method_getAttributes", "name": "CSDT\\CSR3\\Interfaces\\CSR3DTOInterface::getAttributes", "doc": "&quot;Get attributes&quot;"},
            
            {"type": "Trait", "fromName": "CSDT\\CSR3\\Traits", "fromLink": "CSDT/CSR3/Traits.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "doc": "&quot;CSR3DTOTrait.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_setAttribute", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::setAttribute", "doc": "&quot;Set attribute&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_getAttribute", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::getAttribute", "doc": "&quot;Get attribute&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_setAttributes", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::setAttributes", "doc": "&quot;Set attributes&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_getAttributes", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::getAttributes", "doc": "&quot;Get attributes&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_offsetExists", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::offsetExists", "doc": "&quot;Offset exist&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_offsetGet", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::offsetGet", "doc": "&quot;Offset get&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_offsetSet", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::offsetSet", "doc": "&quot;Offset set&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_offsetUnset", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::offsetUnset", "doc": "&quot;Offset unset&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_current", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::current", "doc": "&quot;Current&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_next", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::next", "doc": "&quot;Next&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_key", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::key", "doc": "&quot;Key&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_valid", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::valid", "doc": "&quot;Valid&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3DTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3DTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3DTOTrait.html#method_rewind", "name": "CSDT\\CSR3\\Traits\\CSR3DTOTrait::rewind", "doc": "&quot;Rewind&quot;"},
            
            {"type": "Trait", "fromName": "CSDT\\CSR3\\Traits", "fromLink": "CSDT/CSR3/Traits.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "doc": "&quot;CSR3PropertyDTOTrait.php&quot;"},
                                                        {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_setAttribute", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::setAttribute", "doc": "&quot;Set attribute&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_getAttribute", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::getAttribute", "doc": "&quot;Get attribute&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_setAttributes", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::setAttributes", "doc": "&quot;Set attributes&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_getAttributes", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::getAttributes", "doc": "&quot;Get attributes&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_offsetExists", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::offsetExists", "doc": "&quot;Offset exist&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_offsetGet", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::offsetGet", "doc": "&quot;Offset get&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_offsetSet", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::offsetSet", "doc": "&quot;Offset set&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_offsetUnset", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::offsetUnset", "doc": "&quot;Offset unset&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_current", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::current", "doc": "&quot;Current&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_next", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::next", "doc": "&quot;Next&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_key", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::key", "doc": "&quot;Key&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_valid", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::valid", "doc": "&quot;Valid&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_rewind", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::rewind", "doc": "&quot;Rewind&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_propertyExist", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::propertyExist", "doc": "&quot;Property exist&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_getProperties", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::getProperties", "doc": "&quot;Get properties&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_setProperty", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::setProperty", "doc": "&quot;Set property&quot;"},
                    {"type": "Method", "fromName": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait", "fromLink": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html", "link": "CSDT/CSR3/Traits/CSR3PropertyDTOTrait.html#method_getProperty", "name": "CSDT\\CSR3\\Traits\\CSR3PropertyDTOTrait::getProperty", "doc": "&quot;Get property&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


