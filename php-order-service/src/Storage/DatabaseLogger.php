<?php

namespace App\Storage;

use Doctrine\DBAL\Logging\SQLLogger;
use Psr\Log\LoggerInterface;

class DatabaseLogger implements SQLLogger
{
    private $start = null;
    private $sql = null;
    private $params = null;
    private $types = null;
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function startQuery($sql, $params = null, $types = null): void
    {
        $this->start = microtime(true);
        $this->sql = $sql;
        $this->params = $params;
        $this->types = $types;
    }

    public function stopQuery(): void
    {
        $executionTime = microtime(true) - $this->start;
        
        $this->logger->debug('Database Query', [
            'sql' => $this->sql,
            'params' => $this->params,
            'types' => $this->types,
            'execution_time' => $executionTime
        ]);

        $this->start = null;
        $this->sql = null;
        $this->params = null;
        $this->types = null;
    }
} 