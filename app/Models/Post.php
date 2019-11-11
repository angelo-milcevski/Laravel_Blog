<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
           use Sluggable;

	   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','slug','content','user_id'];
	
	 /*
	*
	*The Eloquent User model namespace
	*
	* @var string
	*/
	protected static $userModel = 'App\Models\User';
	
	/*
	*
	* Returns the user relationship
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*
	*/
	public function user()
	{
		return $this->belongsTo(static::$userModel, 'user_id');
	}
	
	/*
	* Save post
	*
	* @param array $post
	* @return post object
	*/
	public function savePost ($post)
	{
		return $this->create($post);
	}
	
	/*
	* Update post
	*
	* @param array $post
	* @return post object
	*/
	public function updatePost ($post)
	{
		return $this->update($post);
	}
	
	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
