<?php

namespace RIPS\Connector\Requests;

class StatusRequests extends BaseRequest
{
    /**
     * Build a uri for the request
     *
     * @return string
     */
    protected function uri()
    {
        return '/status';
    }

    /**
     * Get status info for the current session and API env.
     *
     * @return \stdClass
     */
    public function getStatus()
    {
        $response = $this->client->get($this->uri());

        return $this->handleResponse($response);
    }
}