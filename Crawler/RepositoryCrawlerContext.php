<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\RepositoryCrawlerBundle\Crawler;

use ONGR\ElasticsearchBundle\DSL\Search;
use ONGR\ElasticsearchBundle\ORM\Repository;

/**
 * Universal crawler context which iterates through all documents of single ElasticSearch type.
 */
class RepositoryCrawlerContext extends AbstractCrawlerContext
{
    /**
     * @var Repository
     */
    protected $repository;

    /**
     * Constructor.
     *
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * {@inheritdoc}
     */
    public function getSearch()
    {
        $search = new Search();
        $search->setSearchType('search_scan');
        // Documentation claims this to be optimal for returning all docs.
        return $search;
    }
}
