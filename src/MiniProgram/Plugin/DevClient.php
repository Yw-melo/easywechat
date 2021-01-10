<?php

declare(strict_types=1);

namespace EasyWeChat\MiniProgram\Plugin;

use EasyWeChat\Kernel\BaseClient;

class DevClient extends BaseClient
{
    /**
     * Get users.
     *
     * @param int $page
     * @param int $size
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUsers(int $page = 1, int $size = 10)
    {
        return $this->httpPostJson('wxa/devplugin', [
            'action' => 'dev_apply_list',
            'page' => $page,
            'num' => $size,
        ]);
    }

    /**
     * Agree to use plugin.
     *
     * @param string $appId
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function agree(string $appId)
    {
        return $this->httpPostJson('wxa/devplugin', [
            'action' => 'dev_agree',
            'appid' => $appId,
        ]);
    }

    /**
     * Refuse to use plugin.
     *
     * @param string $reason
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refuse(string $reason)
    {
        return $this->httpPostJson('wxa/devplugin', [
            'action' => 'dev_refuse',
            'reason' => $reason,
        ]);
    }

    /**
     * Delete rejected applications.
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete()
    {
        return $this->httpPostJson('wxa/devplugin', [
            'action' => 'dev_delete',
        ]);
    }
}