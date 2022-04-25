<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class Lists extends Component
{


    public $items;
    public $view;
    public $itemLayout;
    public $id;
    public $class;
    public $repository;
    public $layout;
    public $title;
    public $subTitle;
    public $params;
    public $margin;
    public $buttonTitle;

    public $titleAlign;
    public $titleColor;
    public $titleVineta;
    public $titleVinetaColor;
    public $titleSize;
    public $titleWeight;
    public $titleTransform;
    public $titleLetterSpacing;
    public $titleLineMarginY;
    public $columnLeft;
    public $columnRight;
    public $orderColumnMain; // 0 - 1
    public $positionContent; // bottom - top
    public $content;
    public $contentUrl;
    public $emptyItems;
    public $itemComponent;
    public $itemComponentAttributesMain;
    public $itemComponentAttributesList;
    public $itemComponentNamespace;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($repository,
                                $class = null,
                                $params = [],
                                $id = 'lists',
                                $buttonTitle = 'Ver Más',
                                $margin = 10,
                                $layout = 'lists-layout-1',
                                $title = "",
                                $subTitle = "",
                                $view = null,
                                $columnLeft = "col-lg-8",
                                $columnRight = "col-lg-4",
                                $orderColumnMain = 0,
                                $positionContent = "bottom",
                                $content=null,
                                $contentUrl=null,
                                $titleAlign = "text-left",
                                $titleLineMarginY= "mt-3 mb-4",
                                $titleColor = null,
                                $titleVineta = null,
                                $titleVinetaColor = null,
                                $titleSize = null,
                                $titleWeight = "font-weight-normal",
                                $titleTransform = null,
                                $titleLetterSpacing = 0,
                                $itemComponent = null,
                                $itemComponentAttributesMain = [],
                                $itemComponentAttributesList = [],
                                $itemComponentNamespace = null
    )
    {

        $this->id = $id ?? 'itemList';
        $this->margin = $margin;
        $this->repository = $repository;
        $this->params = $params;
        $this->layout = $layout ?? 'item-list-layout-1';
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->class = $class;
        $this->buttonTitle = $buttonTitle ?? 'Ver más';

        $this->view = "isite::frontend.components.lists.layouts.{$this->layout}.index";

        $this->getItems();

        $this->emptyItems = false;
        $this->columnLeft = $columnLeft;
        $this->columnRight = $columnRight;
        $this->orderColumnMain = $orderColumnMain;
        $this->positionContent = $positionContent;
        $this->titleAlign = $titleAlign;
        $this->titleLineMarginY = $titleLineMarginY;
        $this->titleColor = $titleColor;
        $this->titleVineta = $titleVineta;
        $this->titleVinetaColor = $titleVinetaColor;
        $this->titleSize = $titleSize;
        $this->titleWeight = $titleWeight;
        $this->titleTransform = $titleTransform;
        $this->titleLetterSpacing = $titleLetterSpacing;
        $this->content = $content;
        $this->contentUrl = $contentUrl;
        $this->itemComponent = $itemComponent ?? "isite::item-list";
        $this->itemComponentNamespace =  $itemComponentNamespace ?? "Modules\Isite\View\Components\ItemList";
        $this->itemComponentAttributesMain = count($itemComponentAttributesMain) ? $itemComponentAttributesMain : config('asgard.isite.config.indexItemListAttributesMain');
        $this->itemComponentAttributesList = count($itemComponentAttributesList) ? $itemComponentAttributesList : config('asgard.isite.config.indexItemListAttributesList');


    }

    private
    function makeParamsFunction()
    {

        return [
            "include" => $this->params["include"] ?? [],
            "take" => $this->params["take"] ?? 12,
            "page" => $this->params["page"] ?? 1,
            "filter" => $this->params["filter"] ?? [],
            "order" => $this->params["order"] ?? null
        ];
    }

    private
    function getItems()
    {

        $this->items = app($this->repository)->getItemsBy(json_decode(json_encode($this->makeParamsFunction())));

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public
    function render()
    {
        return view($this->view);
    }
}
