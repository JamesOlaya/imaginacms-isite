<?php

namespace Modules\Isite\View\Components;

use Illuminate\View\Component;

class ItemList extends Component
{


    public $item;
    public $mediaImage;
    public $view;
    public $withViewMoreButton;
    public $viewMoreButtonLabel;
    public $withCreatedDate;
    public $withCategory;
    public $withUser;
    public $withSummary;
    public $formatCreatedDate;
    public $orderClasses;
    public $numberCharactersSummary;
    public $editLink;
    public $tooltipEditLink;
    public $target;
    public $itemListLayout;
    public $positionNumber;
    public $imageAspect;
    public $imageObject;
    public $imageBorderRadio;
    public $imageBorderRadioType; // 1 all, 2 top, 3 right, 4 left, 5 bottom
    public $imageBorderStyle;
    public $imageBorderWidth;
    public $imageBorderColor;
    public $imagePadding;
    public $imagePicturePadding;
    public $withImageOpacity;
    public $imageOpacityColor;
    public $imageOpacityDirection;

    public $withTitle;
    public $titleAlign;
    public $titleTextSize;
    public $titleTextWeight;
    public $titleTextTransform;

    public $summaryAlign;
    public $summaryTextSize;
    public $summaryTextWeight;

    public $categoryAlign;
    public $categoryTextSize;
    public $categoryTextWeight;

    public $createdDateAlign;
    public $createdDateTextSize;
    public $createdDateTextWeight;

    public $userAlign;
    public $userTextSize;
    public $userTextWeight;

    public $buttonAlign;
    public $buttonLayout;
    public $buttonIcon;
    public $buttonIconLR;
    public $buttonIconColor;
    public $buttonColor;

    public $imagePosition;
    public $imagePositionVertical;
    public $contentPositionVertical;

    public $contentPadding;
    public $contentBorder;
    public $contentBorderColor;
    public $contentBorderRounded;
    public $contentBorderRoundedType; // 1 all, 2 top, 3 right, 4 left, 5 bottom

    public $contentMarginInsideX;
    public $contentBorderShadows;
    public $contentBorderShadowsHover;

    public $titleColor;
    public $summaryColor;
    public $categoryColor;
    public $createdDateColor;
    public $userColor;

    public $titleMarginT;
    public $titleMarginB;
    public $summaryMarginT;
    public $summaryMarginB;
    public $categoryMarginT;
    public $categoryMarginB;
    public $createdDateMarginT;
    public $createdDateMarginB;
    public $userMarginT;
    public $userMarginB;
    public $buttonMarginT;
    public $buttonMarginB;

    public $titleLetterSpacing;
    public $summaryLetterSpacing;
    public $categoryLetterSpacing;
    public $createdDateLetterSpacing;

    public $titleVineta;
    public $titleVinetaColor;

    public $buttonSize;
    public $buttonTextSize;

    public $itemBackgroundColor;
    public $itemBackgroundColorHover;

    public $titleHeight;
    public $summaryHeight;

    public $columnLeft;
    public $columnRight;

    public $titleTextDecoration;
    public $summaryTextDecoration;
    public $categoryTextDecoration;
    public $createdDateTextDecoration;
    
    public $id;
    public $imageRadio;
    public $contentRadio;


    /**
     * Create a new component instance.
     *
     * @param $item
     * @param string $mediaImage
     * @param string $layout
     * @param null $parentAttributes
     * @param bool $withViewMoreButton
     * @param string $viewMoreButtonLabel
     * @param bool $withCreatedDate
     * @param string $formatCreatedDate
     * @param array $orderClasses
     * @param bool $withCategory
     * @param bool $withSummary
     * @param int $numberCharactersSummary
     * @param null $editLink
     * @param null $tooltipEditLink
     * @param null $itemComponentView
     * @param string $itemComponentTarget
     * @param null $itemListLayout
     * @param null $positionNumber
     * @param string $imageAspect
     * @param string $imageObject
     * @param int $imageBorderRadio
     * @param string $imageBorderStyle
     * @param int $imageBorderWidth
     * @param string $imageBorderColor
     * @param string $imageBorderRadioUnit
     * @param int $imagePadding
     * @param string $imageOpcityColor
     * @param string $itemStyle
     * @param bool $withTitle
     * @param string $titleAlign
     * @param string $titleTextSize
     * @param string $titleTextWeight
     * @param string $titleTextTransform
     * @param string $summaryAlign
     * @param string $summaryTextSize
     * @param string $summaryTextWeight
     * @param string $categoryAlign
     * @param string $categoryTextSize
     * @param string $categoryTextWeight
     */
    public function __construct($item,
                                $mediaImage = "mainimage",
                                $layout = 'item-list-layout-1',
                                $parentAttributes = null,
                                $withViewMoreButton = false,
                                $viewMoreButtonLabel = "isite::common.menu.viewMore",
                                $withCreatedDate = false,
                                $withUser = false,
                                $formatCreatedDate = "d \\d\\e M",
                                $orderClasses = [],
                                $withCategory = false,
                                $withSummary = true,
                                $numberCharactersSummary = 100,
                                $editLink = null,
                                $tooltipEditLink = null,
                                $itemComponentView = null,
                                $itemComponentTarget = "_self",
                                $itemListLayout = null,
                                $positionNumber = null,
                                $imageAspect = "1/1",
                                $imageObject = "cover",
                                $imageBorderRadio = 0,
                                $imageBorderRadioType = "1",
                                $imageBorderStyle = "solid",
                                $imageBorderWidth = 0,
                                $imageBorderColor = "#000000",
                                $imagePadding = 0,
                                $imagePicturePadding = 0,
                                $withImageOpacity = false,
                                $imageOpacityColor = "opacity-dark",
                                $imageOpacityDirection = "opacity-top",
                                $withTitle = true,
                                $titleAlign = "",
                                $titleTextSize = "20",
                                $titleTextWeight = "font-weight-bold",
                                $titleTextTransform = "",
                                $summaryAlign = "text-left",
                                $summaryTextSize = "16",
                                $summaryTextWeight = "font-weight-normal",
                                $categoryAlign = "text-left",
                                $categoryTextSize = "18",
                                $categoryTextWeight = "font-weight-normal",
                                $createdDateAlign = "text-left",
                                $createdDateTextSize = "14",
                                $createdDateTextWeight = "font-weight-normal",
                                $userAlign = "text-left",
                                $userTextSize = "14",
                                $userTextWeight = "font-weight-normal",
                                $buttonAlign = "text-left",
                                $buttonLayout = "border-0",
                                $buttonIcon = " ",
                                $buttonIconColor = null,
                                $buttonIconLR = "left",
                                $imagePosition = "1",
                                $imagePositionVertical = "align-self-center",
                                $contentPositionVertical = "align-self-center",
                                $contentPadding = 0,
                                $contentBorder = 0,
                                $contentBorderColor = "#dddddd",
                                $contentBorderRounded = 0,
                                $contentBorderRoundedType = 1,
                                $buttonColor = "primary",
                                $contentMarginInsideX = "mx-0",
                                $contentBorderShadows = "none",
                                $contentBorderShadowsHover = false,
                                $titleColor = "text-primary",
                                $summaryColor = "text-dark",
                                $categoryColor = "text-primary",
                                $createdDateColor = "text-primary",
                                $userColor = "text-primary",
                                $titleMarginT = "mt-2",
                                $titleMarginB = "mb-0",
                                $summaryMarginT = "mt-0",
                                $summaryMarginB = "mb-0",
                                $categoryMarginT = "mt-0",
                                $categoryMarginB = "mb-0",
                                $createdDateMarginT = "mt-0",
                                $createdDateMarginB = "mb-0",
                                $userMarginT = "mt-0",
                                $userMarginB = "mb-0",
                                $buttonMarginT = "mt-0",
                                $buttonMarginB = "mb-0",
                                $titleLetterSpacing = 0,
                                $summaryLetterSpacing = 0,
                                $categoryLetterSpacing = 0,
                                $createdDateLetterSpacing = 0,
                                $titleVineta = "",
                                $titleVinetaColor = "text-dark",
                                $buttonSize = "button-normal",
                                $buttonTextSize = 16,
                                $itemBackgroundColor = "none",
                                $itemBackgroundColorHover = "none",
                                $titleHeight = null,
                                $summaryHeight = "100",
                                $columnLeft = "col-lg-6",
                                $columnRight = "col-lg-6",
                                $titleTextDecoration = "none",
                                $summaryTextDecoration = "none",
                                $categoryTextDecoration = "none",
                                $createdDateTextDecoration = "none"
    )
    {

    $this->item = $item;
    $this->mediaImage = $mediaImage;
    $this->positionNumber = $positionNumber;

    $this->view = $itemComponentView ?? $this->view;
    $this->target = $itemComponentTarget;
    $this->withViewMoreButton = $withViewMoreButton;
    $this->viewMoreButtonLabel = $viewMoreButtonLabel;
    $this->withCreatedDate = $withCreatedDate;
    $this->withUser = $withUser;
    $this->formatCreatedDate = $formatCreatedDate;
    $this->withCategory = $withCategory;
    $this->withSummary = $withSummary;
    $this->numberCharactersSummary = $numberCharactersSummary;
    $this->orderClasses = !empty($orderClasses) ? $orderClasses : ["photo" => "order-0", "title" => "order-1", "date" => "order-2", "categoryTitle" => "order-3", "summary" => "order-4", "viewMoreButton" => "order-5"];
    $this->editLink = $editLink;
    $this->tooltipEditLink = $tooltipEditLink;
    $this->layout = $layout;
    $this->itemListLayout = $itemListLayout;
    $this->imageAspect = $imageAspect;
    $this->imageObject = $imageObject;
    $this->imageBorderRadio = $imageBorderRadio;
    $this->imageBorderStyle = $imageBorderStyle;
    $this->imageBorderWidth = $imageBorderWidth;
    $this->imageBorderColor = $imageBorderColor;
    $this->imagePadding = $imagePadding;
    $this->imagePicturePadding = $imagePicturePadding;
    $this->withImageOpacity = $withImageOpacity;
    $this->imageOpacityColor = $imageOpacityColor;
    $this->imageOpacityDirection = $imageOpacityDirection;

        $this->withTitle = $withTitle;
        $this->titleAlign = $titleAlign;
        $this->titleTextSize = $titleTextSize;
        $this->titleTextWeight = $titleTextWeight;
        $this->titleTextTransform = $titleTextTransform;

        $this->summaryAlign = $summaryAlign;
        $this->summaryTextSize = $summaryTextSize;
        $this->summaryTextWeight = $summaryTextWeight;

        $this->categoryAlign = $categoryAlign;
        $this->categoryTextSize = $categoryTextSize;
        $this->categoryTextWeight = $categoryTextWeight;

        $this->createdDateAlign = $createdDateAlign;
        $this->createdDateTextSize = $createdDateTextSize;
        $this->createdDateTextWeight = $createdDateTextWeight;

        $this->userAlign = $userAlign;
        $this->userTextSize = $userTextSize;
        $this->userTextWeight = $userTextWeight;

        $this->buttonAlign = $buttonAlign;
        $this->buttonLayout = $buttonLayout;
        $this->buttonIcon = $buttonIcon;
        $this->buttonIconColor = $buttonIconColor;
        $this->buttonIconLR = $buttonIconLR;
        $this->buttonColor = $buttonColor;

        $this->imagePosition = $imagePosition;
        $this->imagePositionVertical = $imagePositionVertical;
        $this->contentPositionVertical = $contentPositionVertical;

        $this->contentPadding = $contentPadding;
        $this->contentBorder = $contentBorder;
        $this->contentBorderColor = $contentBorderColor;
        $this->contentBorderRounded = $contentBorderRounded;

        $this->contentMarginInsideX = $contentMarginInsideX;
        $this->contentBorderShadows = "$contentBorderShadows";
        $this->contentBorderShadowsHover = $contentBorderShadowsHover;

        $this->titleColor = $titleColor;
        $this->summaryColor = $summaryColor;
        $this->categoryColor = $categoryColor;
        $this->createdDateColor = $createdDateColor;
        $this->userColor = $userColor;

        $this->titleMarginT = $titleMarginT;
        $this->titleMarginB = $titleMarginB;
        $this->summaryMarginT = $summaryMarginT;
        $this->summaryMarginB = $summaryMarginB;
        $this->categoryMarginT = $categoryMarginT;
        $this->categoryMarginB = $categoryMarginB;
        $this->createdDateMarginT = $createdDateMarginT;
        $this->createdDateMarginB = $createdDateMarginB;
        $this->userMarginT = $userMarginT;
        $this->userMarginB = $userMarginB;
        $this->buttonMarginT = $buttonMarginT;
        $this->buttonMarginB = $buttonMarginB;

        $this->titleLetterSpacing = $titleLetterSpacing;
        $this->summaryLetterSpacing = $summaryLetterSpacing;
        $this->categoryLetterSpacing = $categoryLetterSpacing;
        $this->createdDateLetterSpacing = $createdDateLetterSpacing;

        $this->titleVineta = $titleVineta;
        $this->titleVinetaColor = $titleVinetaColor;

        $this->buttonSize = $buttonSize;
        $this->buttonTextSize = $buttonTextSize;

        $this->itemBackgroundColor = $itemBackgroundColor;
        $this->itemBackgroundColorHover = $itemBackgroundColorHover;

    $this->titleHeight=$titleHeight;
    $this->summaryHeight=$summaryHeight;

    $this->imageBorderRadioType = $imageBorderRadioType;
    $this->contentBorderRoundedType = $contentBorderRoundedType;
    $this->columnLeft = $columnLeft;
    $this->columnRight = $columnRight;
    $this->titleTextDecoration = $titleTextDecoration;
    $this->summaryTextDecoration = $summaryTextDecoration;
    $this->categoryTextDecoration = $categoryTextDecoration;
    $this->createdDateTextDecoration = $createdDateTextDecoration;

    if (!empty($parentAttributes))
      $this->getParentAttributes($parentAttributes);
  
    $this->id = "item".preg_replace( '/[^a-z0-9 ]/i', '', $item->slug ?? $item->title ?? $item->name ?? "").$item->id.uniqid();
  
      // 1 all, 2 top, 3 right, 4 left, 5 bottom
      switch($this->imageBorderRadioType){
        case '2':
         $this->imageRadio=$this->imageBorderRadio."px ".$this->imageBorderRadio."px 0 0";
        break;
        case '3':
          $this->imageRadio=$this->imageBorderRadio."px 0 0 ".$this->imageBorderRadio."px";
        break;
        case '4':
          $this->imageRadio="0 ".$this->imageBorderRadio."px ".$this->imageBorderRadio."px 0";
        break;
        case '5':
          $this->imageRadio="0 0 ".$this->imageBorderRadio."px ".$this->imageBorderRadio."px";
        break;
        default:
          $this->imageRadio=$this->imageBorderRadio."px";
        break;
    
      }
      
  
    //{{-- 1 all, 2 top, 3 right, 4 left, 5 bottom --}}
    switch($this->contentBorderRoundedType){
      case '2':
      $this->contentRadio=$this->contentBorderRounded."px ".$this->contentBorderRounded."px 0 0";
      break;
      case '3':
        $this->contentRadio=$this->contentBorderRounded."px 0 0 ".$this->contentBorderRounded."px";
      break;
      case '4':
        $this->contentRadio="0 ".$this->contentBorderRounded."px ".$this->contentBorderRounded."px 0";
      break;
      case '5':
        $this->contentRadio="0 0 ".$this->contentBorderRounded."px ".$this->contentBorderRounded."px";
      break;
      default:
        $this->contentRadio=$this->contentBorderRounded."px";
      break;
    
    }
    
    
    
    $this->view = "isite::frontend.components.item-list.layouts." . ($this->layout ?? 'item-list-layout-1') . ".index";

  }

  private function getParentAttributes($parentAttributes)
  {

    isset($parentAttributes["mediaImage"]) ? $this->mediaImage = $parentAttributes["mediaImage"] : false;
    isset($parentAttributes["layout"]) ? $this->layout = $parentAttributes["layout"] : false;
    isset($parentAttributes["withViewMoreButton"]) ? $this->withViewMoreButton = $parentAttributes["withViewMoreButton"] : false;
    isset($parentAttributes["viewMoreButtonLabel"]) ? $this->viewMoreButtonLabel = $parentAttributes["viewMoreButtonLabel"] : false;
    isset($parentAttributes["withCreatedDate"]) ? $this->withCreatedDate = $parentAttributes["withCreatedDate"] : false;
    isset($parentAttributes["formatCreatedDate"]) ? $this->formatCreatedDate = $parentAttributes["formatCreatedDate"] : false;
    isset($parentAttributes["withCategory"]) ? $this->withCategory = $parentAttributes["withCategory"] : false;
    isset($parentAttributes["withSummary"]) ? $this->withSummary = $parentAttributes["withSummary"] : false;
    isset($parentAttributes["orderClasses"]) ? $this->orderClasses = !empty($parentAttributes["orderClasses"]) ? $parentAttributes["orderClasses"] : ["photo" => "order-1", "title" => "order-2", "date" => "order-3", "categoryTitle" => "order-4", "summary" => "order-5", "viewMoreButton" => "order-6"] : false;
    isset($parentAttributes["numberCharactersSummary"]) ? $this->numberCharactersSummary = $parentAttributes["numberCharactersSummary"] : 100;
    isset($parentAttributes["itemComponentView"]) ? $this->view = $parentAttributes["itemComponentView"] ?? $this->view : false;
    isset($parentAttributes["target"]) ? $this->target = $parentAttributes["target"] ?? "_self" : false;
    isset($parentAttributes["itemListLayout"]) ? $this->itemListLayout = $parentAttributes["itemListLayout"] : false;
    isset($parentAttributes["imageAspect"]) ? $this->imageAspect = $parentAttributes["imageAspect"] : false;
    isset($parentAttributes["imageObject"]) ? $this->imageObject = $parentAttributes["imageObject"] : false;
    isset($parentAttributes["imageBorderRadio"]) ? $this->imageBorderRadio = $parentAttributes["imageBorderRadio"] : false;
    isset($parentAttributes["imageBorderStyle"]) ? $this->imageBorderStyle = $parentAttributes["imageBorderStyle"] : false;
    isset($parentAttributes["imageBorderWidth"]) ? $this->imageBorderWidth = $parentAttributes["imageBorderWidth"] : false;
    isset($parentAttributes["imageBorderColor"]) ? $this->imageBorderColor = $parentAttributes["imageBorderColor"] : false;
    isset($parentAttributes["imagePadding"]) ? $this->imagePadding = $parentAttributes["imagePadding"] : false;
    isset($parentAttributes["withImageOpacity"]) ? $this->withImageOpacity = $parentAttributes["withImageOpacity"] : false;
    isset($parentAttributes["imageOpacityColor"]) ? $this->imageOpacityColor = $parentAttributes["imageOpacityColor"] : false;
    isset($parentAttributes["imageOpacityDirection"]) ? $this->imageOpacityDirection = $parentAttributes["imageOpacityDirection"] : false;
    isset($parentAttributes["withTitle"]) ? $this->withTitle = $parentAttributes["withTitle"] : false;


  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render()
  {
    return view($this->view);
  }
}