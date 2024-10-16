<?php

use Illuminate\Support\Facades\Storage;

beforeEach(function () {

});

test('Dropbox API connection', function ()
{
	expect(Storage::disk('dropbox')->get('testfile'))->toBe('OK');
});