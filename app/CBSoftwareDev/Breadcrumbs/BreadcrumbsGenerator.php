<?php

namespace App\CBSoftwareDev\Breadcrumbs;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Routing\Router;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\Traits\Macroable;

class BreadcrumbsGenerator
{
    use Macroable;
    static $Pages = [];

    public function __construct(protected Router $router, protected ViewFactory $viewFactory)
    {
        
    }


    public static function for(string $name, callable $callback)
    {
        self::$Pages[$name] = $callback;
    }

    public function Generate(string $name="",?Breadcrumbs $breadcrumbs = null): array
    {
        if(!$breadcrumbs)
        {
            $breadcrumbs = new Breadcrumbs($this);
        }
        if($name == "")
        {
            $name = request()->route()->getName();
        }
        if(isset(self::$Pages[$name]))
        {
            self::$Pages[$name]($breadcrumbs);
            return $breadcrumbs->toArray();
        }
        return [];
    }
}

class Breadcrumbs implements Arrayable
{
    protected $breadcrumbs = [];
    
    public function __construct(protected BreadcrumbsGenerator $generator)
    {
        
    }
    
    public function Parent($name) {
        $this->generator->Generate($name,$this);
    }
    public function push(string $name, string $url): void
    {
        $this->breadcrumbs[] = [
            'name' => $name,
            'url' => $url,
        ];
    }

    public function toArray(): array
    {
        return $this->breadcrumbs;
    }
}
