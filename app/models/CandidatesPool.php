<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Group
 *

 */
class CandidatesPool extends Eloquent{
    protected $table = 'candidates_pools';
    protected $fillable = array('name','user_id','created_at');
    

    public function users()
    {
        return $this->belongsToMany('User');
    }
      public function user() // for backend section added on 28.02.2015
    {
        return $this->belongsTo('User');
    }
    public function language()
    {
        return $this->hasMany('CandidatesPoolLanguage')->with('language')->with('languageLevel');   //old code
        //return $this->belongsToMany('Language');
    }
    
    public function social()
    {
        return $this->hasMany('CandidatesPoolSocial')->with('socialCategory')->with('socialPosition');
    }

    public function option()
    {
        return $this->belongsToMany('Option')->with('group');
    }
    
    public function workLength()
    {
        return $this->belongsToMany('WorkDuration');
    }
    
    public function workType()
    {
        return $this->belongsToMany('WorkType');
    }
    
    public function sportLevel()
    {
        return $this->belongsToMany('SportLevel');
    }
    
    public function sportName()
    {
        return $this->belongsToMany('SportName');
    }
    
    public function socialCategory()
    {
        return $this->belongsToMany('SocialCategory');
    }
    
    public function socialPosition()
    {
        return $this->belongsToMany('SocialPosition');
    }
    
    public function skill()
    {
        return $this->belongsToMany('Skill');
    }
    
    public function degreeTypes()
    {
        return $this->belongsToMany('DegreeType');
    }
    
    public function degreeResults()
    {
        return $this->belongsToMany('DegreeResult');
    }
    
    public function degreeSubjects()
    {
        return $this->belongsToMany('DegreeSubject');
    }
    
    public function getEmails()
    {
        return $this->users()->get()->lists('email');
    }
    
}
