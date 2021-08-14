<?php

if (! function_exists('changeLocaleInRoute')) {
    function changeLocaleInRoute(Illuminate\Routing\Route $route, $newLocale)
    {
        $parameters = $route->parameters();
        $parameters['locale'] = $newLocale;
        $name = $route->getName();
        
        return route($name,$parameters);
    }
}

if (! function_exists('mtGetRoute')) {
    function mtGetRoute($type = null, $page = null, $id = null, $parent_id = null, $gParent_id = null)
    {
        if($type == null && $type == '')    { $page .= ''; }
        if($type == 'index')    { $page .= '.index'; }
        if($type == 'create')   { $page .= '.create'; }
        if($type == 'edit')     { $page .= '.edit'; }
        if($type == 'store')    { $page .= '.store'; }
        if($type == 'update')   { $page .= '.update'; }
        if($type == 'show')     { $page .= '.show'; }
        if($type == 'destroy')  { $page .= '.destroy'; }

        if(isset($id) && isset($parent_id) && isset($gParent_id)) { 
            $route = route( $page, ['id' => $id, 'parent_id' => $parent_id, 'gParent_id' => $gParent_id] ); 
        }
        
        elseif(isset($id) && isset($parent_id)) { 
            $route = route( $page, ['id' => $id, 'parent_id' => $parent_id] ); 
        }
        
        elseif(isset($id)) { 
            $route = route( $page, ['id' => $id] ); 
        }
        
        else{
            $route = route( $page ); 
        }
        
        // if(isset($id) && !isset($parent_id)) { 
        //     $route = route( $page, ['id' => $id] ); 
        // }
        // if(!isset($id) && isset($parent_id)) { 
        //     $route = route( $page, ['parent_id' => $parent_id] ); 
        // }
        // if(isset($id) && isset($parent_id)) { 
        //     $route = route( $page, ['id' => $id, 'parent_id' => $parent_id] ); 
        // }
        // if(!isset($id) && !isset($parent_id)) { 
        //     $route = route($page); 
        // }
        
        return $route; 
    }
}

if(! function_exists('mtTextField')){
    function mtTextField($title = null, $var = null, $value= null, $errors = null, $optional = null){
        (isset($optional['type']))? $type = $optional['type'] : $type = 'text';
        (isset($optional['grid']))? $grid = $optional['grid'] : $grid = 'col-md-12 col-sm-12';
        (isset($optional['isFirst']))? $isFirst = $optional['isFirst'] : $isFirst = false;
        (isset($optional['hasFormGroup']))? $hasFormGroup = $optional['hasFormGroup'] : $hasFormGroup = 'col-md-12 col-sm-12';
        if($isFirst == false) $grid .= ' padding-top-15';
        $input = '';
        if($hasFormGroup == true) $input .= '<div class="form-group">';
        $input .=    '<div class="'.$grid.'">';
        $input .=    '<label>'.$title.'</label>';
        $input .=       '<input type="'.$type.'" name="'.$var.'" value="'.$value.'"'; 
        $input .=       ' class="form-control required '; 
        if($errors->has($var)) $input .= "error";
        $input .= ' "> ';
        if ($errors->has($var)){
            $input .=   '<span class="help-block text-danger"><strong> '.$errors->first($var).' </strong></span>';
        }
        $input .= '</div>';
        if($hasFormGroup == true) $input .= '</div>';
        return $input;
    }
}

if(! function_exists('mtTextAreaField')){
    function mtTextAreaField($title = null, $var = null, $value= null, $errors = null, $optional = null){
        (isset($optional['type']))? $type = $optional['type'] : $type = 'text';
        (isset($optional['grid']))? $grid = $optional['grid'] : $grid = 'col-md-12 col-sm-12';
        (isset($optional['isFirst']))? $isFirst = $optional['isFirst'] : $isFirst = false;
        (isset($optional['hasFormGroup']))? $hasFormGroup = $optional['hasFormGroup'] : $hasFormGroup = 'col-md-12 col-sm-12';
        if($isFirst == false) $grid .= ' padding-top-15';
        $input = '';
        if($hasFormGroup == true) $input .= '<div class="form-group">';
        $input .=    '<div class="'.$grid.'">';
        $input .=    '<label>'.$title.'</label>';
        $input .=       '<textarea name="'.$var.'" class="summernote form-control" data-height="200" data-lang="en-US">'; 
        $input .=       $value; 
        $input .=       '</textarea>';
        if ($errors->has($var)){
            $input .=   '<span class="help-block text-danger"><strong> '.$errors->first($var).' </strong></span>';
        }
        $input .= '</div>';
        if($hasFormGroup == true) $input .= '</div>';
        return $input;
    }
}

if(! function_exists('mtRadioField')){
    function mtRadioField($title = null, $var = null, $value= null, $errors = null, $data= [], $optional = null){
        (isset($optional['type']))? $type = $optional['type'] : $type = 'text';
        (isset($optional['grid']))? $grid = $optional['grid'] : $grid = 'col-md-12 col-sm-12';
        (isset($optional['isFirst']))? $isFirst = $optional['isFirst'] : $isFirst = false;
        (isset($optional['hasFormGroup']))? $hasFormGroup = $optional['hasFormGroup'] : $hasFormGroup = 'col-md-12 col-sm-12';
        if($isFirst == false) $grid .= ' padding-top-15';
        $input = '';
        if($hasFormGroup == true) $input .= '<div class="form-group">';
        $input .=    '<div class="'.$grid.'">';
        $input .=    '<label>'.$title.'</label>';        
        foreach($data as $d){
            $radioValue = $d['radioValue'];
            $radioTitle = $d['radioTitle'];
            $input .= '<input type="radio" name="'.$var.'" value="'.$radioValue.'" ';
            if($value == $radioValue) $input .= ' checked="" ';
            $input .= ' "> <span>'.$radioTitle.'</span>';
        }
        if ($errors->has($var)){
            $input .=   '<span class="help-block text-danger"><strong> '.$errors->first($var).' </strong></span>';
        }
        $input .= '</div>';
        if($hasFormGroup == true) $input .= '</div>';
        return $input;
    }
}

if(! function_exists('mtSelectField')){
    function mtSelectField($title = null, $var = null, $value= null, $errors = null, $data= [], $optional = null){
        (isset($optional['type']))? $type = $optional['type'] : $type = 'text';
        (isset($optional['grid']))? $grid = $optional['grid'] : $grid = 'col-md-12 col-sm-12';
        (isset($optional['isFirst']))? $isFirst = $optional['isFirst'] : $isFirst = false;
        (isset($optional['hasFormGroup']))? $hasFormGroup = $optional['hasFormGroup'] : $hasFormGroup = 'col-md-12 col-sm-12';
        if($isFirst == false) $grid .= ' padding-top-15';
        $input = '';
        if($hasFormGroup == true) $input .= '<div class="form-group">';
        $input .=    '<div class="'.$grid.'">';
        $input .=    '<label>'.$title.'</label>';        
        $input .= '<select name="'.$var.'" class="form-control pointer required" >';
        foreach($data as $d){
            $selectValue = $d['selectValue'];
            $selectTitle = $d['selectTitle'];
            $input .= '<option value="'.$selectValue.'" ';
            if($value == $selectValue) $input .= ' selected ';
            $input .= ' >'.$selectTitle.'</option>';
        }
        $input .= '</select>';
        if ($errors->has($var)){
            $input .=   '<span class="help-block text-danger"><strong> '.$errors->first($var).' </strong></span>';
        }
        $input .= '</div>';
        if($hasFormGroup == true) $input .= '</div>';
        return $input;
    }
}