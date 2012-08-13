<?php
/**
 * Fetches the current milestone, it's due date and the next milestone.
 * The response is in JSON for direct usage in JS.
 *
 * @author Jens-André Koch <vain@clansuite.com>
 * @license GPLv2+
 */

include 'tracrpc.php';
$trac = new Trac_RPC('http://trac.clansuite.com/jsonrpc');

/**
 * Get ALL Milestones
 */
$milestones = $trac->getTicketMilestone();

/**
 * Get EACH Milestones Metadata
 */
$trac->setMultiCall(true);

foreach($milestones as $id => $milestone)
{
    $trac->getTicketMilestone('get', $milestone);
    $trac->_doRequest();
    $milestones_data[] = objectToArray($trac->getResponse());
}

/**
 * Convert inner Objects to Arrays
 *
 * @todo objectToArray() should get the inner objects, too!
 */
foreach($milestones_data as $milestone)
{
    $milestones_data_array[] = objectToArray($milestone);
}

foreach($milestones_data_array as $id => $entry)
{
    /**
     * Milestone must not be completed, yet...
     * Milestone must have a due date set...
     */
    if(false === is_array($entry['result']['completed']) and true === is_array($entry['result']['due']))
    {
        $date_now = new DateTime("now");
        $date_due = new DateTime($entry['result']['due']['1']);
        $date_due->add(new DateInterval('PT1H')); # add one hour; trac does not return a gmt +1 date.
        $dateDifference = $date_now->diff($date_due);

        $json_response_arr = array(
            'current_milestone' => $milestones[$id],
            'due'               => $date_due->format(DateTime::ISO8601),
            'now'               => $date_now->format(DateTime::ISO8601),
            'late'              => $dateDifference->invert,
            'next_milestone'    => $milestones[$id+1]
        );

        echo json_encode($json_response_arr);

        break;
    }
}

#var_dump($milestones_data_array);

/**
 * Converts an object into an array.
 * Handles __jsonclass__ subobject properties, too!
 *
 * @todo sub_array transformation:
 * (jsonclass ( [0] = key [1] = value ))
 * into
 * ( key => value )
 *
 * @param type $d
 * @return type
 */
function objectToArray($d = null) {
    /**
     * Turn object properties into array.
     */
    if (is_object($d)) {
        $d = get_object_vars($d);
    }

    /**
     * loop over all former "properties", which might be
     * objects and convert them to.
     */
    foreach($d as $key => $value)
    {
        if($key == '__jsonclass__')
        {
            $d = $value; #@todo sub-array transformation

            continue;
        }

        if(is_object($value))
        {
            $d[$key] = objectToArray($value);
        }
    }

    return $d;
}

#var_dump($trac->error);
?>