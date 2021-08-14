@extends('mco.layouts.admin')

@section('css')
    <!-- Include one of jTable styles. -->
    
    <link href="{{ asset('assets/jtable/themes/redmond/jquery-ui-1.8.16.custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/jtable/themes/metro/lightgray/jtable.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <p><div id="activitiesTableContainer"></div></p>
@endsection


@section('scripts')
    <script src="{{ asset('assets/jtable/jquery-ui-1.10.0.min.js') }}"></script>
    <!-- Include jTable script file. -->
    <script src="{{ asset('assets/jtable/jquery.jtable.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/jtable/localization/jquery.jtable.ar.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
		    //Prepare jTable
			$('#activitiesTableContainer').jtable({
				title: '<i class="fa fa-file-text-o"></i> Articles',
				paging: true,
				pageSize: 15,
				sorting: true,
				defaultSorting: 'articleNo ASC',
				useBootstrap: true,
				actions: {
					listAction: 'journals_details_list',
					createAction: 'journals_details_add',
					updateAction: 'journals_details_update',
					deleteAction: 'journals_details_delete'
				},
				fields: {
					articleNo: {
						key: true,
						create: false,
						width: '5%',
						edit: false,
						list: true
                    },
					journalNo: {
						title: "Journal Name",
						width: '10%',
						list: true,
						defaultValue: 0,
						options: 'journals_options'
					},
					articleLanguage: {
						title: "Language",
						width: '10%',
						list: true,
						defaultValue: 0,
						options: 'languages_options'
					},
					articleTitle: {
						title: 'Article Title',
						width: '30%'
					},
					journalIssue: {
						title: 'Issue No',
						width: '5%'
					},
					articleDate: {
						title: 'Article Date',
						width: '10%',
						type: 'date'
                    },
					articleDesc : {
						title: 'Description',
						edit: true,
						type: 'textarea',
						list: false
					},
					articlePicture: {
		                title: 'Article Picture',
		                list: true,
		                create: true,
		                edit: true,
						width: '35%',
                        display: function (data) {
							if(data.record.articlePicture){
                                return "<div class='bg-success'><label data-toggle='popover' imgURL='"+data.record.articlePicture+"'>"+data.record.articlePicture+"</label></div>";
                            }else{
                                return "<div class='bg-danger'><label>No Image Found</label></div>";
                            }
                        },
		                input: function (data) {
							if(data.record){
								return '<div id="FileUpload" name="FileUpload"></div><div id="imgArea"><input type="hidden" name="articlePicture" value="'+data.record.articlePicture+'" /></div>';
							}else{
								return '<div id="FileUpload" name="FileUpload"></div><div id="imgArea"></div>';
							}
		                }
					}
                },
                recordsLoaded: function(event, data) {
                    $('.jtable-data-row').find('[data-toggle="popover"]').each( function(){
                            $(this).css('cursor','pointer');
                            $(this).popover({
                                placement : 'auto right ',
                                trigger : 'hover',
                                html : true,
                                content : '<img width="100%" src="{{Config::get("mmacpanel.journalsPath")}}/'+$(this).attr('imgURL')+'" class="thumbnail" alt="" />'
                            });
                    });
                },
                    //Initialize validation logic when a form is created
                formCreated: function (event, data) {
                    data.form.find('textarea').ckeditor(
                        {
                            uiColor: '#9AB8F3',
                            'toolbar' : [
                                [ 'Source', '-', 'Bold', 'Italic' ],
                                [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ],
                                [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ]
                            ]
                        }
                    );
					data.form.find('from').addClass("form");
					data.form.find('input').addClass("form-control");
					data.form.find('select').addClass("form-control");
                    $('#FileUpload').uploadify({
                        'formData'     : {
                            'timestamp' : '<?php echo time();?>',
                            'token'     : '<?php echo md5('unique_salt' . time());?>',
                            'folder'    		: "{{Config::get('mmacpanel.journalsPath')}}",
                            'fileExt'     		: '*.jpg;*.gif;*.png',
                        },
                        'swf'               : '{{Request::root()}}/assets/uploadify/uploadify.swf',
                        'uploader'  		: '{{Request::root()}}/assets/uploadify/uploadify.php',
                        'cancelImg' 		: '{{Request::root()}}/assets/uploadify/cancel.png',
                        'sizeLimit'   		: 10485760,
                        'auto'      		: true,
                        'onSelect'	     : function() {
                            //alert("Selected");
                        },
                        'onError'     : function (event,ID,fileObj,errorObj) {
                            //alert("Error");
                        },
                        'onUploadSuccess'	 : function(file,data,response) {
                            //alert("Success"+data);
                            $("#imgArea").html('<input type="hidden" name="articlePicture" value="'+file.name+'" /><img src="{{Config::get('mmacpanel.journalsPath')}}/'+file.name+'" width="100" />');
                        }
                    });
                //data.form.validationEngine();

                    //data.form.find('input[name="newsTitle"]').addClass('validate[required]');
                    //data.form.find('input[name="part2"]').addClass('validate[required]');
                    /*data.form.find('input[name="EmailAddress"]').addClass('validate[required,custom[email]]');
                    data.form.find('input[name="Password"]').addClass('validate[required]');
                    data.form.find('input[name="BirthDate"]').addClass('validate[required,custom[date]]');
                    data.form.find('input[name="Education"]').addClass('validate[required]');*/
                    //data.form.validationEngine();
                }
			});

			$('#journalsTableContainer').jtable({
				title: '<i class="fa fa-copy"></i> Journals',
				paging: true,
				pageSize: 15,
				sorting: true,
				defaultSorting: 'journalNo ASC',
				useBootstrap: true,
				actions: {
					listAction: 'journals_list',
					createAction: 'journals_add',
					updateAction: 'journals_update',
					deleteAction: 'journals_delete'
				},
				fields: {
					journalNo: {
						key: true,
						create: false,
						edit: false,
						list: true
					},
					journalName: {
						title: 'Journal Name',
						width: '40%'
					},
					journalNameEn: {
						title: 'Journal Name En',
						width: '40%'
					},
					journalDesc : {
						title: 'Journal Desc',
						edit: true,
						type: 'textarea',
						list: false
					},
					journalDescEn : {
						title: 'Journal Desc En',
						edit: true,
						type: 'textarea',
						list: false
					},
					journalPicture: {
		                title: 'journal Picture',
		                list: true,
		                create: true,
		                edit: true,
						width: '35%',
                        display: function (data) {
							if(data.record.journalPicture){
                                return "<div class='bg-success'><label>"+data.record.journalPicture+"<label></div>";
                            }else{
                                return "<div class='bg-danger'><label>No Image Found<label></div>";
                            }
                        },
		                input: function (data) {
							if(data.record){
								return '<div id="FileUpload" name="FileUpload"></div><div id="imgArea"><input type="hidden" name="journalPicture" value="'+data.record.journalPicture+'" /></div>';
							}else{
								return '<div id="FileUpload" name="FileUpload"></div><div id="imgArea"></div>';
							}
		                }
					}
                },
                    //Initialize validation logic when a form is created
                formCreated: function (event, data) {
                    data.form.find('textarea').ckeditor(
                        {
                            uiColor: '#9AB8F3',
                            'toolbar' : [
                                [ 'Source', '-', 'Bold', 'Italic' ],
                                [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ],
                                [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ]
                            ]
                        }
                    );
					data.form.find('from').addClass("form");
					data.form.find('input').addClass("form-control");
					data.form.find('select').addClass("form-control");
                    $('#FileUpload').uploadify({
                        'formData'     : {
                            'timestamp' : '<?php echo time();?>',
                            'token'     : '<?php echo md5('unique_salt' . time());?>',
                            'folder'    		: "{{Config::get('mmacpanel.journalsPath')}}",
                            'fileExt'     		: '*.jpg;*.gif;*.png',
                        },
                        'swf'               : '{{Request::root()}}/assets/uploadify/uploadify.swf',
                        'uploader'  		: '{{Request::root()}}/assets/uploadify/uploadify.php',
                        'cancelImg' 		: '{{Request::root()}}/assets/uploadify/cancel.png',
                        'sizeLimit'   		: 10485760,
                        'auto'      		: true,
                        'onSelect'	     : function() {
                            //alert("Selected");
                        },
                        'onError'     : function (event,ID,fileObj,errorObj) {
                            //alert("Error");
                        },
                        'onUploadSuccess'	 : function(file,data,response) {
                            //alert("Success"+data);
                            $("#imgArea").html('<input type="hidden" name="journalPicture" value="'+file.name+'" /><img src="{{Config::get('mmacpanel.journalsPath')}}/'+file.name+'" width="100" />');
                        }
                    });
                //data.form.validationEngine();

                    //data.form.find('input[name="newsTitle"]').addClass('validate[required]');
                    //data.form.find('input[name="part2"]').addClass('validate[required]');
                    /*data.form.find('input[name="EmailAddress"]').addClass('validate[required,custom[email]]');
                    data.form.find('input[name="Password"]').addClass('validate[required]');
                    data.form.find('input[name="BirthDate"]').addClass('validate[required,custom[date]]');
                    data.form.find('input[name="Education"]').addClass('validate[required]');*/
                    //data.form.validationEngine();
                }
			});

            //Load person list from server
			$('#journalsDetailsTableContainer').jtable('load');
			$('#journalsTableContainer').jtable('load');

        });

	</script>
@endsection
