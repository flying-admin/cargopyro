# Utilisation

Pour utiliser l'une des fonctions disponible - déclarez une fonction à Twig portant le même nom que la fonction PHP. Les arguments seront les mêmes.

    {% verbatim %}{{ html_build_query({"foo": "Bar"}) }}{% endverbatim %} // foo=Bar

<hr>

{% set functions = [
    'addslashes',
    'array_merge',
    'array_merge_recursive',
    'count',
    'empty',
    'explode',
    'get_class',
    'html_entity_decode',
    'htmlentities',
    'htmlspecialchars',
    'htmlspecialchars_decode',
    'http_build_str',
    'http_build_query',
    'implode',
    'is_array',
    'is_int',
    'is_integer',
    'is_string',
    'ltrim',
    'md5',
    'memory_get_usage',
    'mt_rand',
    'nl2br',
    'parse_url',
    'preg_match',
    'preg_replace',
    'print_r',
    'rtrim',
    'sprintf',
    'str_pad',
    'str_replace',
    'str_word_count',
    'strip_plugins',
    'strpos',
    'strtolower',
    'strtoupper',
    'substr',
    'trim',
    'ucfirst',
    'ucwords',
    'var_export',
    'var_dump'
    ] %}

<ul>
{% for function in functions %}
    <li><a href="http://php.net/manual/en/function.{{ str_slug(function, '-') }}.php">{{ function }}</a></li>
{% endfor %}
</ul>