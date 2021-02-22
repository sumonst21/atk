<?php

namespace Sintattica\Atk\Attributes;

use Sintattica\Atk\Core\Tools;
use Sintattica\Atk\Db\Query;

/**
 * Class MultiListAttribute
 *
 * Use this class instead of MultiSelectAttribute and MultiSelectListAttribute.
 */
class MultiListAttribute extends MultiSelectListAttribute
{
    private $m_displaySeparator = ', ';
    private $m_exportSeparator = '';

    function __construct($name, $flags, $optionArray, $valueArray = null)
    {
        parent::__construct($name, $flags, $optionArray, $valueArray);

        $this->setSelect2Options(['close-on-select' => false], 'edit');
    }

    public function setDisplaySeparator($separator)
    {
        $this->m_displaySeparator = $separator;
    }

    public function setExportSeparator($separator)
    {
        $this->m_exportSeparator = $separator;
    }

    function display($record, $mode)
    {
        $values = $record[$this->fieldName()];
        $res = [];

        for ($i = 0; $i < count($values); $i++) {
            if ($r = $this->_translateValue($values[$i], $record)) {
                $res[] = $r;
            }
        }

        if ($mode == 'csv') {
            // export separator
            $sep = $this->m_exportSeparator ?: $this->m_displaySeparator;
        } else {
            $sep = $this->m_displaySeparator;
        }

        return implode($sep, $res);
    }

    function value2db($rec)
    {
        if (is_array($rec[$this->fieldName()]) && count($rec[$this->fieldName()]) >= 1) {
            // store the values like |value1|value2|...
            // (compared to MultiSelectAttribute, it adds the separator also at the begin and at the end of the values
            // in this way, the search is more secure (see getSearchCondition)
            return Tools::escapeSQL($this->m_fieldSeparator.implode($this->m_fieldSeparator, $rec[$this->fieldName()]).$this->m_fieldSeparator);
        }

        return '';
    }

    function db2value($rec)
    {
        if (isset($rec[$this->fieldName()]) && $rec[$this->fieldName()] !== '') {
            // remove initial and final separators
            $value = substr($rec[$this->fieldName()], 1, strlen($rec[$this->fieldName()]) - 2);
            // transform in array
            return explode($this->m_fieldSeparator, $value);
        }

        return [];
    }

    function getSearchCondition(Query $query, $table, $value, $searchmode, $fieldname = '')
    {
        // MultiSelectAttribute has only 1 searchmode and that is "substring".
        $searchconditions = [];

        if (is_array($value) && $value[0] != "" && count($value) > 0) {
            // includes the separators in the value to search, in this way the search is more secure
            if (in_array('__NONE__', $value)) {
                return $query->nullCondition($table.'.'.$this->fieldName(), true);
            }

            if (count($value) == 1) {
                $searchconditions[] = $query->substringCondition($table.".".$this->fieldName(), Tools::escapeSQL($this->m_fieldSeparator.$value[0].$this->m_fieldSeparator));
            } else {
                foreach ($value as $str) {
                    $searchconditions[] = $query->substringCondition($table.".".$this->fieldName(), Tools::escapeSQL($this->m_fieldSeparator.$str.$this->m_fieldSeparator));
                }
            }
        }

        return count($searchconditions) ? '('.implode(' OR ', $searchconditions).')' : '';
    }
}
