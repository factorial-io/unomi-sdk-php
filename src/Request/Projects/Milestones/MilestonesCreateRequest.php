<?php

namespace Nascom\TeamleaderApiClient\Request\Projects\Milestones;

use Nascom\TeamleaderApiClient\Request\PostRequest;

/**
 * Class MilestonesCreateRequest
 * @package Nascom\TeamleaderApiClient\Request\Projects\Milestones
 */
class MilestonesCreateRequest extends PostRequest
{
    /**
     * MilestonesCreateRequest constructor.
     * @param array $milestone
     */
    public function __construct(array $milestone)
    {
        $milestone['project_id'] = $milestone['project']['id'];
        $milestone['responsible_user_id'] = $milestone['responsible_user']['id'];

        unset
        (
            $milestone['project'],
            $milestone['responsible_user']
        );

        $this->body = $milestone;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return 'milestones.create';
    }
}
