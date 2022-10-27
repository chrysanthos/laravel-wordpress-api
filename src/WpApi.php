<?php

namespace Chrysanthos\LaravelWordpressApi;

use GuzzleHttp\Client;

class WpApi
{
    protected $client;

    protected $endpoint;

    public function __construct($endpoint, Client $client = null)
    {
        $this->endpoint = $endpoint;
        $this->client = $client ?: new Client();
    }

    /**
     * Get all posts.
     *
     * @param int $count
     * @param int $page
     *
     * @return array
     */
    public function latest($count = 4, $page = 1, $orderBy = null)
    {
        $query = ['query' => ['_embed' => true, 'page' => $page, 'per_page' => $count]];

        if (isset($orderBy)) {
            $query['query']['orderby'] = $orderBy;
        }

        $response = $this->client->get($this->endpoint.'posts', $query);

        return json_decode((string) $response->getBody());
    }

    /**
     * Get post by slug.
     *
     * @param string $slug
     *
     * @return array
     */
    public function post($slug)
    {
        $query = ['query' => ['slug' => $slug, '_embed' => true]];
        $response = $this->client->get($this->endpoint.'posts', $query);

        return json_decode((string) $response->getBody())[0];
    }

    /**
     * Get data from the API.
     *
     * @param string $method
     * @param array  $query
     *
     * @return array
     */
    public function get($method, array $query = [])
    {
        $query = ['query' => $query];

        $response = $this->client->get($this->endpoint.$method, $query);

        $results = json_decode((string) $response->getBody(), true);

        return $this->paginateResults($response, $results);
    }

    protected function paginateResults($response, $results)
    {
        return [
            'results' => $results,
            'total'   => $response->getHeaderLine('X-WP-Total'),
            'pages'   => $response->getHeaderLine('X-WP-TotalPages'),
        ];
    }
}
