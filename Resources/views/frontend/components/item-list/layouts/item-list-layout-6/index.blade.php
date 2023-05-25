<div id="{{$id}}" class="item-layout item-list-layout-6 position-relative {{$itemClasses}} {{$itemMarginB}}">
  <x-isite::edit-link link="{{$editLink}}{{$item->id}}" :item="$item" tooltip="{{$tooltipEditLink}}"/>
  <div class="card-item @if($imageOpacityHover) opacity-with-hover @else opacity-without-hover @endif">
    <div class="row align-items-center">

       @if(method_exists ( $item, "mediaFiles" ) && $withImage )
          <div
            class="col-12 {{$orderClasses["photo"] ?? 'order-0'}} item-image @if($withImageOpacity) {{$imageOpacityColor}} {{$imageOpacityDirection}} @endif">
            <x-media::single-image :alt="$item->title ?? $item->name" :title="$item->title ?? $item->name"
                                   :url="$item->url ?? null" :isMedia="true"  imgClasses="img-style"
                                   :withVideoControls="$videoControls" :loopVideo="$videoLoop"
                                   :autoplayVideo="$videoAutoplay" :mutedVideo="$videoMuted"
                                   :target="$target" :mediaFiles="$item->mediaFiles()" imgStyles="width:{{$imageWidth}}%; height:{{$imageHeight}};"
                                   :zone="$mediaImage ?? 'mainimage'"/>

          </div>
       @endif
      @if($withTitle)
      <div class="col-12 {{$orderClasses["title"] ?? 'order-1'}} item-title">
          @if(isset($item->url) && !empty($item->url))
          <a href="{{$item->url}}" target="{{$target}}" class="{{$titleColor}}">
          @endif
            <{{$titleHead}} class="title d-flex {{$titleClasses}} {{empty($item->url) ? $titleColor : '' }} {{$titleAlignVertical}} {{$titleAlign}} {{$titleTextWeight}} {{$titleTextTransform}}  {{$titleMarginT}} {{$titleMarginB}} {{$contentMarginInsideX}}">
                @if($titleVineta) <i class="{{$titleVineta}} {{$titleVinetaColor}} mr-2"></i>  @endif
                <span> {!! Str::limit( $item->title ?? $item->name ?? '', $numberCharactersTitle) !!}  </span>
            </{{$titleHead}}>
          @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withCreatedDate)
        <div class="col-12 {{$orderClasses["date"] ?? 'order-2'}} item-created-date {{$createdDateAlign}}">
          @if(isset($item->url)&& !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div
                class="created-date {{$createdDateClasses}} {{$createdDateTextWeight}} {{$createdDateColor}} {{$createdDateMarginT}} {{$createdDateMarginB}} {{$contentMarginInsideX}}">
                {{ $date }}
              </div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withUser && ( isset($item->user)))
        <div class="col-12 {{$orderClasses["user"] ?? 'order-3'}} item-user {{$userAlign}}">
          @if(isset($item->url)&& !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div
                class="user {{$userTextWeight}} {{$userColor}} {{$userMarginT}} {{$userMarginB}} {{$contentMarginInsideX}}">
                Por: {{$item->user->present()->fullname()}}
              </div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withCategory && isset($item->category->id))
        <div class="col-12 {{$orderClasses["categoryTitle"] ?? 'order-4'}} item-category {{$categoryAlign}}">
          @if(isset($item->category->url) && !empty($item->category->url))
            <a href="{{$item->category->url}}" target="{{$target}}">
              @endif
              <h5
                class="category {{$categoryClasses}} {{$categoryTextWeight}} {{$categoryColor}} {{$categoryMarginT}} {{$categoryMarginB}} {{$contentMarginInsideX}}">
                {{$item->category->title ?? $item->category->name}}
              </h5>
              @if(isset($item->category->url) && !empty($item->category->url))
            </a>
          @endif
        </div>
      @endif
      @if($withSummary && ( isset($item->summary) || isset($item->description) || isset($item->custom_html)) )
        <div class="col-12 {{$orderClasses["summary"] ?? 'order-5'}} item-summary {{$summaryAlign}}">
          @if(isset($item->url) && !empty($item->url))
            <a href="{{$item->url}}" target="{{$target}}">
              @endif
              <div
                class="summary {{$summaryClasses}} {{$summaryTextWeight}} {{$summaryColor}} {{$summaryMarginT}} {{$summaryMarginB}} {{$contentMarginInsideX}}">
                {!! $summary !!}
              </div>
              @if(isset($item->url) && !empty($item->url))
            </a>
          @endif
        </div>
      @endif
      @if($withViewMoreButton)
        <div class="col-12 {{$orderClasses["viewMoreButton"] ?? 'order-6'}} item-view-more-button {{$buttonAlign}}">
          @if(isset($item->url) && !empty($item->url))

                @if($viewMoreButtonLabel=="")
                    @php $labelExist= false; @endphp
                @else
                    @php $labelExist= true; @endphp
                @endif
            <x-isite::button :style="$buttonLayout"
                             :buttonClasses="$buttonSize.' view-more-button '.$buttonLayout.' '.$buttonMarginT.' '.$buttonMarginB.' '.$contentMarginInsideX.' '.$buttonItemClasses"
                             :href="$item->url"
                             :withIcon="$buttonIconLR"
                             :iconPosition="$buttonIconLR"
                             :iconClass="$buttonIcon"
                             :withLabel="$labelExist"
                             :color="$buttonColor"
                             :label="trans($viewMoreButtonLabel)"
                             :target="$target"
                             :iconColor="$buttonIconColor"
                             :sizeLabel="$buttonTextSize"
            />
          @endif
        </div>
      @endif
         @foreach($extraOrderClassesFields as $key => $extraOrderClassesField )
           
           @if(isset($item->{$extraOrderClassesField}) || isset($item->options->{$extraOrderClassesField}))
             <div class="col-12 {{$orderClasses[$extraOrderClassesField] ?? 'order-6'}} item-{{$extraOrderClassesField}}">
               
               @if(isset($item->{$extraOrderClassesField}))
                 {{ $item->{$extraOrderClassesField} }}
               @elseif(isset($item->options->{$extraOrderClassesField}))
                 {{ $item->options->{$extraOrderClassesField} }}
               @endif
              
             </div>
           @endif
         @endforeach
    </div>

  </div>

<style>
    #{{$id}} .item-image picture:before {
        border-radius: {{$imageRadio}};
        top: {{$imagePadding}}px;
        left: {{$imagePadding}}px;
        bottom: {{$imagePadding}}px;
        right: {{$imagePadding}}px;
        @if((!$imageOpacityHover) && $withImageOpacity && ($imageOpacityColor=='opacity-custom'))
            content: "";
            position: absolute;
            background: {{$imageOpacityCustom}};
        @endif
    }
    @if($imageOpacityHover && $withImageOpacity)
    #{{$id}} .card-item:hover .item-image picture {
         position: relative;
         display: block !important;
         overflow: hidden;
         transition: background 0.5s ease-out;
     }
    #{{$id}} .card-item:hover .item-image picture:before {
         border-radius: {{$imageRadio}};
         top: {{$imagePadding}}px;
         left: {{$imagePadding}}px;
         bottom: {{$imagePadding}}px;
         right: {{$imagePadding}}px;
         @if($imageOpacityColor=='opacity-custom')
         content: "";
         position: absolute;
         background: {{$imageOpacityCustom}};
         @endif
    }
    @endif
   
    #{{$id}} .item-image picture {
        display: block !important;
        padding: {{$imagePicturePadding}}px;
        text-align: {{$imageAlign}};
        position: relative;
        box-shadow:  {{$imageShadow}};
        border-radius: {{$imageRadio}};
    }
    
    #{{$id}} .img-style {
       border-radius: {{$imageRadio}};
       border-style: {{$imageBorderStyle}};
       border-width: {{$imageBorderWidth}}px;
       border-color: {{$imageBorderColor}};
       aspect-ratio: {{$imageAspect}};
       object-fit: {{$imageObject}};
       padding: {{$imagePadding}}px;
       display: inline-flex;
    }
    #{{$id}} .cover-img {
         border-radius: {{$imageRadio}};
         border-style: {{$imageBorderStyle}};
         border-width: {{$imageBorderWidth}}px;
         border-color: {{$imageBorderColor}};
         aspect-ratio: {{$imageAspect}};
         padding: {{$imagePadding}}px;
         box-shadow:  {{$imageShadow}};
         height: {{$imageHeight}};
         z-index: 1;
         position: relative;
     }

    #{{$id}} .card-item {
        background-color: {{$itemBackgroundColor}};
        padding-left: {{$contentPaddingL}}px;
        padding-right: {{$contentPaddingR}}px;
        padding-top: {{$contentPaddingT}}px;
        padding-bottom: {{$contentPaddingB}}px;
        border-width: {{$contentBorder}}px;
        border-style: solid;
        border-color: {{$contentBorderColor}};
        border-radius: {{$contentRadio}};
        @if(!$contentBorderShadowsHover)
        box-shadow: {{$contentBorderShadows}};
        @endif
        @if($contentBorderShadows)
             margin: 5px;
        @endif
    }
    #{{$id}} .card-item:hover {
        background-color: {{$itemBackgroundColorHover}};
        @if($contentBorderShadowsHover)
        box-shadow: {{$contentBorderShadows}};
        @endif
    }
    #{{$id}} .item-title .title {
        font-size: {{$titleTextSize}}px;
        letter-spacing: {{$titleLetterSpacing}}px;
        overflow: hidden;
        height: @if($titleHeight) {{$titleHeight}}px @else auto @endif;
        text-shadow:  {{$titleShadow}};
    }
    #{{$id}} .item-summary .summary {
        font-size: {{$summaryTextSize}}px;
        letter-spacing: {{$summaryLetterSpacing}}px;
        line-height: {{$summaryLineHeight}}px;
        overflow: hidden;
        height: @if($summaryHeight) {{$summaryHeight}}px @else auto @endif;
        text-shadow:  {{$summaryShadow}};
    }
    #{{$id}} .item-category .category {
        font-size: {{$categoryTextSize}}px;
        letter-spacing: {{$categoryLetterSpacing}}px;
        text-shadow:  {{$categoryShadow}};
    }
    #{{$id}} .item-created-date .created-date {
        font-size: {{$createdDateTextSize}}px;
        letter-spacing: {{$createdDateLetterSpacing}}px;
        text-shadow:  {{$createdDateShadow}};
    }
    #{{$id}} .item-view-more-button .view-more-button {
         text-shadow:  {{$buttonShadow}};
    }
    #{{$id}} .item-title a:hover {
         text-decoration: {{$titleTextDecoration}};
     }
    #{{$id}} .item-summary a:hover {
         text-decoration: {{$summaryTextDecoration}};
     }
    #{{$id}} .item-category a:hover {
         text-decoration: {{$categoryTextDecoration}};
     }
    #{{$id}} .item-created-date a:hover {
         text-decoration: {{$createdDateTextDecoration}};
    }
    @media (max-width: 991.98px) {
        #{{$id}} .item-title .title {
            font-size: {{$titleTextSizeMobile}}px;
        }
    }
    @if(!is_null($imageAspectMobile))
        @media (max-width: 767.98px) {
        #{{$id}} .img-style, #{{$id}} .cover-img {
            aspect-ratio: {{$imageAspectMobile}};
        }
    }
    @endif

    @if($buttonLayout=="button-custom")
    #{{$id}} .button-custom {
     color: {{$buttonConfig["color"]}};
     border: {{$buttonConfig["border"]}};
     background: {{$buttonConfig["background"]}};
     border-radius: {{$buttonConfig["borderRadius"]}};
     box-shadow: {{$buttonConfig["boxShadow"]}};
     transition: {{$buttonConfig["transition"]}};
    }
    #{{$id}} .button-custom:hover {
     color: {{$buttonConfig["colorHover"]}};
     border: {{$buttonConfig["borderHover"]}};
     background: {{$buttonConfig["backgroundHover"]}};
     box-shadow: {{$buttonConfig["boxShadowHover"]}};
    }
    @endif

    @if( $item->mediaFiles()->{$mediaImage}->isVideo)
        @if($withImageOpacity && ($imageOpacityColor=='opacity-custom'))
        @if(!$imageOpacityHover)
            #{{$id}}  .item-image  {
                position:relative;
            }
            #{{$id}}  .item-image:before {
                border-radius: {{$imageRadio}};
                top: {{$imagePadding}}px;
                left: {{$imagePadding + 15}}px;
                bottom: {{$imagePadding}}px;
                right: {{$imagePadding + 15}}px;
                position: absolute;
                background: {{$imageOpacityCustom}};
                content: '';
                z-index: 2;
            }
        @else
            #{{$id}} .card-item:hover .item-image  {
                position:relative
            }
            #{{$id}} .card-item:hover .item-image:before {
                border-radius: {{$imageRadio}};
                top: {{$imagePadding}}px;
                left: {{$imagePadding + 15}}px;
                bottom: {{$imagePadding + 15}}px;
                right: {{$imagePadding}}px;
                position: absolute;
                background: {{$imageOpacityCustom}};
                content: '';
                z-index: 2;
            }
        @endif
        @endif
    @endif
</style>
</div>





