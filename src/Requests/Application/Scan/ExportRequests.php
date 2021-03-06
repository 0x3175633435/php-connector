<?php

namespace RIPS\Connector\Requests\Application\Scan;

use RIPS\Connector\Entities\Response;
use RIPS\Connector\Requests\BaseRequest;

class ExportRequests extends BaseRequest
{
    /**
     * Build the uri for the request
     *
     * @param int $appId
     * @param int $scanId
     * @param string $type
     * @return string
     */
    protected function uri($appId, $scanId, $type)
    {
        return "/applications/{$appId}/scans/{$scanId}/exports/{$type}";
    }

    /**
     * Export info for scan in CSV format
     *
     * @param int $appId
     * @param int $scanId
     * @param string $outFile - File path that CSV contents will be stored to
     * @param array $queryParams
     * @return Response
     */
    public function exportCsv($appId, $scanId, $outFile, array $queryParams = [])
    {
        $response = $this->client->get($this->uri($appId, $scanId, 'csvs'), [
            'sink'  => $outFile,
            'query' => $queryParams,
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Export info for scan in PDF format
     *
     * @param int $appId
     * @param int $scanId
     * @param string $outFile - File path that PDF contents will be stored to
     * @param array $queryParams
     * @return Response
     */
    public function exportPdf($appId, $scanId, $outFile, array $queryParams = [])
    {
        $response = $this->client->get($this->uri($appId, $scanId, 'pdfs'), [
            'sink'  => $outFile,
            'query' => $queryParams,
        ]);

        return $this->handleResponse($response);
    }
}
