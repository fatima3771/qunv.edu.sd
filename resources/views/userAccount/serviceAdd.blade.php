@extends('userAccount.layouts.beyond')

@section('breadcrumb')
  <li><i class="fa fa-fw fa-home"></i> <a href="{{ request()->root() }}">الرئيسية</a></li>
  <li><a href="{{ request()->root() }}/userAccount">حسابي</a></li>
  <li><a href="{{ request()->root() }}/userAccount/services">خدماتي</a></li>
  <li class="breadcrumb-item active">إضافة خدمة جديدة</li>
@endsection

@section('header-title')
    <i class="fa fa-fw fa-plus" aria-hidden="true"></i> إضافة خدمة جديدة
@endsection

@section('row-title')
  <h5 class="row-title">
    <i class="fa fa-fw fa-plus" aria-hidden="true"></i> إضافة خدمة جديدة
  </h5>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="widget radius-bordered">
          <div class="widget-header bordered-bottom bordered-palegreen">
              <span class="widget-caption"> يرجى ملء الفورم التالي لإضافة خدمة جديدة </span>
              <div class="widget-buttons">
                  <a href="#" data-toggle="config">
                      <i class="fa fa-cog yellow"></i>
                  </a>
                  <a href="#" data-toggle="maximize">
                      <i class="fa fa-expand pink"></i>
                  </a>
                  <a href="#" data-toggle="collapse">
                      <i class="fa fa-minus blue"></i>
                  </a>
                  <a href="#" data-toggle="dispose">
                      <i class="fa fa-times darkorange"></i>
                  </a>
              </div>
          </div>

          <div class="widget-body">

            <div id="simplewizard" class="wizard" data-target="#simplewizard-steps">
                <ul class="steps">
                    <li data-target="#simplewizardstep1" class="active"><span class="step">1</span>بيانات الخدمة<span class="chevron"></span></li>
                    <li data-target="#simplewizardstep2"><span class="step">2</span>صور الخدمة<span class="chevron"></span></li>
                    <li data-target="#simplewizardstep3"><span class="step">3</span>إضافات للخدمة<span class="chevron"></span></li>
                    <li data-target="#simplewizardstep4"><span class="step">4</span>نشر الخدمة<span class="chevron"></span></li>
                </ul>
            </div>
            <div class="step-content" id="simplewizard-steps">
                <div class="step-pane active" id="simplewizardstep1">
                  @if(session('done'))
                  <div class="alert alert-success fade in">
                      <button class="close" data-dismiss="alert">
                          ×
                      </button>
                      <i class="fa-fw fa fa-check"></i>
                      تمت إضافة الخدمة <strong>بنجاح</strong>
                  </div>

                  <p>يمكنك الآن:</p>
                  <ul>
                    <li>
                      رفع صور توضيحية أو إعلانية للخدمة لجذب طالبي الخدمة لخدمتك
                      <a href="{{ session('service')->getUrl('forUser','addPictures') }}"> أضف صور إلى خدمتي </a>
                    </li>
                    <li>
                      عمل إضافات للخدمة بمبالغ إضافية، لتنويع الخيارات لطالب الخدمة
                      <a href="{{ session('service')->getUrl('forUser','addExtras') }}"> أضف إضافات إلى خدمتي </a>
                    </li>
                    <li>
                      نشر الخدمة مباشرة
                      <a href="{{ session('service')->getUrl('forUser','publish') }}"> نشر الخدمة مباشرة </a>
                    </li>
                  </ul>
                  @else
                    <div id="addServiceForm">
                        {{ Form::open(['route' => 'userAccount.storeService', 'class'=>'form', 'enctype' => 'multipart/form-data', 'id' => 'addServiceForm', 'role' => 'form']) }}
          
                          <div class="form-title">عنوان الفورم</div>
          
                          <div class="form-group @if($errors->has('name')) has-feedback has-error @endif">
                            {{ Form::label('name','ما هي الخدمة التي تود تقديمها؟') }}
                            {{ Form::text('name','',[
                              'class'=>'form-control',
                              'data-bv-notempty'=>'true',
                              'data-bv-notempty-message'=>'يرجى إدخال اسم الخدمة التي تود تقديمها'
                              ]) }}
                            <p class="help-block">أدخل عنواناً واضحاً باللغة العربية يصف الخدمة التي تريد أن تقدمها. لا تدخل رموزاً أو كلمات مثل "حصرياً"، "لأول مرة"، "لفترة محدود".. الخ.</p>
                            @if($errors->has('name'))
                              <i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="name" style=""></i>
                              <div class="has-error"> {{ $errors->first('name') }} </span>
                            @endif
                          </div>
          
                          <div class="form-group @if($errors->has('price')) has-feedback has-error @endif">
                            {{ Form::label('price','ما هو المبلغ الذي تريده مقابل هذه الخدمة؟') }}
                            {{ Form::number('price','',[
                              'class'=>'spinbox-input form-control',
                              'data-bv-notempty'=>'true',
                              'data-bv-notempty-message'=>'يرجى إدخال المبلغ المطلوب نظير تنفيذ الخدمة'
                            ]) }}
                            <p class="help-block">حدد المبلغ المطلوب لتنفيذ الخدمة، مع مراعاة أن يكون المبلغ منطقياً و منافساً.</p>
                            @if($errors->has('price'))
                              <i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="price" style=""></i>
                              <div class="has-error"> {{ $errors->first('price') }} </span>
                            @endif
                          </div>
          
                          <div class="form-group @if($errors->has('mainCat')) has-feedback has-error @endif">
                              @php
                                $catsList = [''=>'اختر التصنيف الرئيسي'];
                                $catsList += \App\Cat::where('cat_id',0)->pluck('name','id')->toArray();
                              @endphp
                              {{ Form::label('mainCat','التصنيف') }}
                              {{ Form::select('mainCat',$catsList,old('mainCat'),[
                                  'class'=>'form-control',
                                  'data-bv-notempty'=>'true',
                                  'data-bv-notempty-message'=>'يرجى اختيار التصنيف الرئيسي'
                              ]) }}
                              @if($errors->has('mainCat'))
                                <i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="mainCat" style=""></i>
                                <div class="has-error"> {{ $errors->first('mainCat') }} </span>
                              @endif
                            </div>
            
                          <div class="form-group @if($errors->has('cat_id')) has-feedback has-error @endif">
                              {{ Form::label('cat_id','التصنيف') }}
                              {{ Form::select('cat_id',[0=>'اختر التصنيف الرئيسي أولا ثم اختر التصنيف الفرعي الفرعي'],old('cat_id'),[
                                  'class'=>'form-control',
                                  'data-bv-notempty'=>'true',
                                  'data-bv-notempty-message'=>'يرجى اختيار التصنيف الفرعي'
                                ]) }}
                              @if($errors->has('cat_id'))
                                <i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="cat_id" style=""></i>
                                <div class="has-error"> {{ $errors->first('cat_id') }} </span>
                              @endif
                          </div>
            
                          <div class="form-group @if($errors->has('txt')) has-feedback has-error @endif">
                              {{ Form::label('txt','وصف الخدمة') }}
                              {{ Form::textarea('txt','',['class'=>'form-control textareaanimated','rows'=>'2']) }}
                              <p class="help-block">أدخل وصف الخدمة بدقة يتضمن جميع المعلومات والشروط . يمنع وضع البريد الالكتروني، رقم الهاتف أو أي معلومات اتصال أخرى.</p>
                              @if($errors->has('txt'))
                                  <i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="txt" style=""></i>
                                  <small class="help-block" data-bv-validator="notEmpty" data-bv-for="txt" data-bv-result="INVALID" style="">الرجاء وصف الخدمة</small>
                                  <div class="has-error"> {{ $errors->first('txt') }} </span>
                              @endif
                          </div>          
          
                          <div class="form-group @if($errors->has('tags')) has-feedback has-error @endif">
                              {{ Form::label('tags','كلمات مفتاحية') }}
                              {{ Form::text('tags','مثال',['class'=>'form-control', 'data-role'=>'tagsinput']) }}
                              <p class="help-block">مثال: تطوير مواقع، ووردبريس، تصميم</p>
                              @if($errors->has('tags'))
                                <i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="tags" style=""></i>
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="tags" data-bv-result="INVALID" style="">The first tags is required and cannot be empty</small>
                                <div class="has-error"> {{ $errors->first('tags') }} </span>
                              @endif
                          </div>
  
                          <div class="form-group @if($errors->has('period_id')) has-feedback has-error @endif">
                              @php
                                  $periodList = \App\ServicePeriod::pluck('name','id')->toArray();
                              @endphp
                              {{ Form::label('period_id','مدة التسليم') }}
                              {{ Form::select('period_id',$periodList,old('period_id'),['class'=>'form-control']) }}
                              <p class="help-block">حدد مدة تسليم مناسبة لك. يستطيع المشتري إلغاء الخدمة مباشرة في حال التأخر بتسليم الخدمة في الموعد المحدد.</p>
                              @if($errors->has('period_id'))
                                <i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="period_id" style=""></i>
                                <small class="help-block" data-bv-validator="notEmpty" data-bv-for="period_id" data-bv-result="INVALID" style="">The first name is required and cannot be empty</small>
                                <div class="has-error"> {{ $errors->first('period_id') }} </span>
                              @endif
                          </div>
          
                          <div class="form-group @if($errors->has('comments')) has-feedback has-error @endif">
                              {{ Form::label('comments','تعليمات للمشتري') }}
                              {{ Form::textarea('comments',null,['class'=>'form-control textareaanimated','rows'=>'2']) }}
                              <p class="help-block">المعلومات التي تحتاجها من المشتري لتنفيذ الخدمة. تظهر هذه المعلومات بعد شراء الخدمة فقط.</p>
                              @if($errors->has('comments'))
                                  <i class="form-control-feedback glyphicon glyphicon-remove" data-bv-icon-for="comments" style=""></i>
                                  <small class="help-block" data-bv-validator="notEmpty" data-bv-for="comments" data-bv-result="INVALID" style="">The first comments is required and cannot be empty</small>
                                  <div class="has-error"> {{ $errors->first('comments') }} </span>
                              @endif
                          </div>          

                          <div class="form-group">
                              {!! Form::submit('أضف الخدمة', ['id'=>'submit-all','class'=>'btn btn-primary']) !!}
                          </div>

                        {{ Form::close() }}
                      </div>
          
                
                
                  @endif
                </div>
            </div>

          </div>
        </div>

    </div>

</div>
@endsection


@section('scripts')
  <!--Page Related Scripts-->
  <script src="{{ asset('public/assets/beyond/assets/js/validation/bootstrapValidator.js') }}"></script>
  <script src="{{ asset('public/assets/beyond/assets/js/dropzone/dropzone.min.js') }}"></script>
  <!--Jquery Autosize-->
  <script src="{{ asset('public/assets/beyond/assets/js/textarea/jquery.autosize.js') }}"></script>
  <!--Bootstrap Tags Input-->
  <script src="{{ asset('public/assets/beyond/assets/js/tagsinput/bootstrap-tagsinput.js') }}"></script>
  <script>
    $(document).ready(function () {
      // $("#addServiceForm").bootstrapValidator();

      //--JQuery Autosize--
      $('.textareaanimated').autosize({ append: "\n" });

     
      // Dropzone.options.myDropzone = {
      //       url: "/Account/Create",
      //       autoProcessQueue: false,
      //       uploadMultiple: true,
      //       parallelUploads: 100,
      //       maxFiles: 100,
      //       acceptedFiles: "image/*",

      //       init: function () {

      //           var submitButton = document.querySelector("#submit-all");
      //           var wrapperThis = this;

      //           submitButton.addEventListener("click", function () {
      //               wrapperThis.processQueue();
      //           });

      //           this.on("addedfile", function (file) {

      //               // Create the remove button
      //               var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");

      //               // Listen to the click event
      //               removeButton.addEventListener("click", function (e) {
      //                   // Make sure the button click doesn't submit the form:
      //                   e.preventDefault();
      //                   e.stopPropagation();

      //                   // Remove the file preview.
      //                   wrapperThis.removeFile(file);
      //                   // If you want to the delete the file on the server as well,
      //                   // you can do the AJAX request here.
      //               });

      //               // Add the button to the file preview element.
      //               file.previewElement.appendChild(removeButton);
      //           });

      //           this.on('sendingmultiple', function (data, xhr, formData) {
      //               formData.append("Username", $("#Username").val());
      //           });
      //       }
      //   };

      function putSubCatValues(){
        var mainCatObject = $('select[name="mainCat"]');
        var mainCat = mainCatObject.val();
        if(mainCat > 0) {
              $.ajax({
                  url: '{{ request()->root() }}/userAccount/getSubCatList/'+mainCat,
                  type: "GET",
                  dataType: "json",
                  success:function(data) {
                      $('select[name="cat_id"]').empty();
                      $.each(data, function(key, value) {
                        // console.log(value);
                          $('select[name="cat_id"]').append('<option value="'+ value.id +'">'+ value.nameEn +'</option>');
                      });

                  }
              });
          }else{
              $('select[name="cat_id"]').empty();
              $('select[name="cat_id"]').append('<option value="">اختر التصنيف الرئيسي أولا ثم اختر التصنيف الفرعي</option>');
          }        
      }

      putSubCatValues();

      $('select[name="mainCat"]').on('change', function() {
        putSubCatValues();
      });
    });
  </script>
@endsection