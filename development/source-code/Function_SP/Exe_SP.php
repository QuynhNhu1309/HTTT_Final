function exe_sp($spName, $spPamameters)
{
    $sqlQuery = "EXEC ".$spName." ";
    $parameters=[];
    foreach($spPamameters as $index => $spPamameter)
    {
        array_push($parameters,'@'.$index.'='.$spPamameter);
    }
    $sqlQuery .= implode(",",$parameters);
    return $sqlQuery;
}