<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Trait TranslatableTrait
 * @property string title
 * @package App\Traits
 */
trait TranslatableTrait
{
	/**
	 * Get all translates
	 * @return MorphMany
	 */
	public function translates(): MorphMany
	{
		return $this->morphMany(config('impression-admin.translatable_class'), 'translatable');
	}

	/**
	 * @param $field
	 * @param null $lang
	 * @return mixed
	 */
	public function translate($field, $lang = null)
	{
		if (is_null($lang)) {
			if ($this->hasTranslation('title', app()->getLocale())) {
				$lang = app()->getLocale();
			} else {
                $lang = optional($this->translates()->first())->lang;
			}
		}
		return $this->translates()->where('lang', $lang)->value($field);
	}

	/**
	 * @param $field
	 * @param null $lang
	 * @return bool
	 */
	public function hasTranslation($field, $lang = null): bool
	{
		if (is_null($lang)) {
			$lang = app()->getLocale();
		}
		return !is_null($this->translates()->whereLang($lang)->value($field));
	}

	/**
	 * @return $this
	 */
	public function makeTranslation()
	{
		foreach (config('app.locales') as $lang) {
			$attrs = [
				'lang' => $lang,
				'title' => request($lang)['title'],
			];

			if (isset(request($lang)['content'])) {
				foreach (request($lang)['content'] as $key => $data) {
                    $attrs['content'][$key] = $data;
				}
			}

			$this->translates()->create($attrs);
		}
		return $this;
	}

	/**
	 * @return $this
	 */
	public function updateTranslation()
	{
		foreach (config('app.locales') as $lang) {
			$attrs = [
				'title' => request($lang)['title'],
			];

			if (isset(request($lang)['content'])) {
				foreach (request($lang)['content'] as $key => $data) {
                    $attrs['content'][$key] = $data;
				}
			}
			$this->translates()->updateOrCreate([
				'lang' => $lang,
			], $attrs);
		}
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitleAttribute()
	{
		return $this->translate('title');
	}

	/**
	 * @return mixed
	 */
	public function getContentAttribute()
	{
		return (object)$this->translate('content');
	}
}
