<?php

namespace Modules\Isite\Http\Livewire\Filters;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Modules\Isite\Transformers\SearchItemTransformer;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Isearch\Repositories\SearchRepository;
use Illuminate\Support\Str;

class Autocomplete extends Component
{

  /*
  * Attributes From Config
  */
  public $title;
  public $name;
  public $status;
  public $type;
  public $repository;
  public $listener;
  public $layout;
  public $classes;
  public $options;
  public $params;


  /*
  * Attributes
  */
  public $view;
  public $search;
  public $defaultView;
  protected $results;
  public $showModal;
  public $icon;
  public $placeholder;
  public $minSearchChars;
  public $repositories;


  protected $queryString = [
    'search' => ['except' => ''],
  ];

  public function mount($layout = 'autocomplete-layout-1', $showModal = false, $icon = 'fa fa-search',
                        $placeholder = null, $title = '', $params = [])
  {
    $this->defaultView = 'isite::frontend.livewire.filters.autocomplete.layouts.autocomplete-layout-1.index';
    $this->view = isset($layout) ? 'isite::frontend.livewire.filters.autocomplete.layouts.' . $layout . '.index' : $this->defaultView;
    $this->results = [];
    $this->showModal = isset($showModal) ? $showModal : false;
    $this->icon = isset($icon) ? $icon : 'fa-search';
    $this->placeholder = $placeholder ?? trans('isearch::common.form.search_here');
    $this->title = $title;
    $minSearchChars = setting('isearch::minSearchChars', null, "3");
    $this->minSearchChars = $minSearchChars;
  }
  public function hydrate()
  {
    \Log::info('Autocomplete: HYDRATE');
    $this->results = [];
  }
  private function makeParamsFunction()
  {
    return [
      "include" => $this->params["include"] ?? ['category'],
      "take" => $this->params["take"] ?? 12,
      "page" => $this->params["page"] ?? false,
      "filter" => array_merge_recursive($this->params["filter"], ["search" => $this->search, "locale" => \App::getLocale()]),
      "order" => $this->params["order"] ?? null,
    ];
  }
  public function render()
  {
    $params = $this->makeParamsFunction();
    $validatedData = Validator::make(
      ['search' => $this->search],
      ['search' => 'required|min:' . $this->minSearchChars]
    );
    if ($this->search) {
      if ($validatedData->fails()) {
        $this->alert('error', trans('isearch::common.index.Not Valid', ["minSearchChars" => $this->minSearchChars]), config("asgard.isite.config.livewireAlerts"));
      } else {

        $this->results = $this->searchRepository()->getItemsBy(json_decode(json_encode($params)));
      }
    }
    $search = Str::lower($this->search);
    $this->results = $this->results->sortByDesc(function ($item, $key) use ($search) {
      $initial = 0;
      $haystack = Str::lower($item->title ?? $item->name);
      $bits_of_haystack = explode(' ', $haystack);
      foreach (explode(" ", $search) as $substring) {
        if (!in_array($substring, $bits_of_haystack))
          continue; // skip this needle if it doesn't exist as a whole word
        $initial += substr_count($haystack, $substring);
      }
      return $initial;
    });

    return view($this->view, ["results" => $this->results]);
  }

  /**
   * @return SearchRepository
   */
  private function searchRepository()
  {
    return app('Modules\Isearch\Repositories\SearchRepository');
  }
}
