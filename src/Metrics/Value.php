<?php


namespace Salfade\Metric\Metrics;


abstract class Value
{

    protected $title = 'Stat';
    protected $value = '0';
    protected $icon = 'chart-bar';
    protected $url = '#';


    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }


    /**
     * @return string
     */
    public function icon(): string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return $this->url;
    }

    abstract public function value();

}
