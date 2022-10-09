<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RedisController extends Controller
{
    /**
     * Returns all keys stored in Redis.
     *
     * @return View
     */
    public function get(): View
    {
        $redisKeys = Cache::get('all_keys');
        return view('get-redis-keys')->with('redisKeys', $redisKeys);
    }

    /**
     * Add the data to Redis.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function set(Request $request): RedirectResponse
    {
        $request->validate([
            'key' => 'required|string|max:1000',
            'value' => 'required|string',
        ]);

        $key = $request->input('key');
        $value = $request->input('value');

        Cache::forever($key, $value);
        $this->addOrUpdateRedisKeys($key);

        return back()->with(['status' => true, 'message' => 'Data save success']);
    }

    /**
     * Delete the data to Redis.
     *
     * @param $keyId
     * @return RedirectResponse
     */
    public function delete($keyId): RedirectResponse
    {
        if (Cache::has('all_keys') && $keyId) { // In Redis, the key "all_keys" is not empty
            Cache::forget($keyId);
            $this->addOrUpdateRedisKeys($keyId);
        }

        $redisKeys = Cache::get('all_keys');
        return back()->with('redisKeys', $redisKeys);
    }


    /**
     * Adds all keys to Redis under the "all_keys" key.
     *
     * @param string $value
     * @return void
     */
    private function addOrUpdateRedisKeys(string $value): void
    {
        if (Cache::has('all_keys') && $value) { // In Redis, the key "all_keys" is not empty
            $keys = Cache::get('all_keys');
            $searchKey = array_search($value, $keys);

            if ($searchKey !== false) { // if that key is found then delete it
                unset($keys[$searchKey]);
            } else { // if there is no same key, then add it
                $keys[] = $value;
            }

            Cache::forever('all_keys', $keys);
        } elseif ($value) {
            Cache::forever('all_keys', [$value]);
        }
    }
}
