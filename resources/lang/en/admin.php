<?php
return App\Locale::where('section_id',2)->pluck('en','var')->toArray();
