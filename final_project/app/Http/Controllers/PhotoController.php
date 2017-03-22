<?php

use Illuminate\Support\Facades\Storage;

class PhotoController extends BaseController {
2
3	/**
4	 * òîáğàçèòü ïğîôèëü ñîîòâåòñòâóşùåãî ïîëüçîâàòåëÿ.
5	 */
6	public function showPhoto($id)
7	{
8		$user = User::find($id);
9
10		return View::make('user.profile', array('user' => $user));
11	}
12
13}