<?php

$config = new PhpCsFixer\Config();
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('vendor')
    ->exclude('application/cache')
    ->exclude('application/logs')
    ->exclude('system')
    ->name('*.php');

return $config
    ->setRules(array(
        '@PSR2'                                       => TRUE,
        'array_syntax'                                => array('syntax' => 'long'),
        'no_multiline_whitespace_around_double_arrow' => TRUE,
        'no_whitespace_before_comma_in_array'         => TRUE,
        'normalize_index_brace'                       => TRUE,
        'trim_array_spaces'                           => TRUE,
        'whitespace_after_comma_in_array'             => array('ensure_single_space' => TRUE),
        'braces_position'                             => array('control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end', 'functions_opening_brace' => 'next_line_unless_newline_at_signature_end', 'classes_opening_brace' => 'same_line'),
        'constant_case'                               => array('case' => 'upper'),
        'lowercase_keywords'                          => FALSE,
        'no_multiple_statements_per_line'             => TRUE,
        'control_structure_continuation_position'     => array('position' => 'next_line'),
        'include'                                     => TRUE,
        'trailing_comma_in_multiline'                 => array('elements' => array('arrays')),
        'yoda_style'                                  => FALSE,
        'no_unused_imports'                           => TRUE,
        'ordered_imports'                             => array('sort_algorithm' => 'alpha'),
        'binary_operator_spaces'                      => array('default' => 'align_single_space'),
        'concat_space'                                => array('spacing' => 'none'),
        'not_operator_with_space'                     => TRUE,
        'phpdoc_align'                                => array('align' => 'left'),
        'phpdoc_annotation_without_dot'               => TRUE,
        'phpdoc_indent'                               => TRUE,
        'phpdoc_no_empty_return'                      => TRUE,
        'phpdoc_no_package'                           => TRUE,
        'phpdoc_scalar'                               => TRUE,
        'phpdoc_separation'                           => TRUE,
        'phpdoc_single_line_var_spacing'              => TRUE,
        'phpdoc_summary'                              => TRUE,
        'strict_comparison'                           => TRUE,
        'single_quote'                                => TRUE,
        'no_whitespace_in_blank_line'                 => TRUE,
    ))
    ->setFinder($finder);
