/*
 * Calculates the Smallest Multiple for a range of 1 to rangeMax
 * by computing the Least Common Multiple for every number up to
 * the max.
 */
function calculateSmallestMultiple(rangeMax) {
    
    var smallestMultiple = 1;
    for (i = 2; i <= rangeMax; i++) {
        smallestMultiple = getleastCommonMultiple(smallestMultiple, i)
    }
    return smallestMultiple;
}

/*
 * Calculate the least common multiple of 2 numbers:
 * The least common multiple of a and b is the product 
 * divided by the greatest common divisor. I.e. lcm(a, b) = ab/gcd(a, b)
 */
function getleastCommonMultiple(num1, num2) {
    gcd = getGreatestCommonDenominator(num1, num2);
    lcm = (num1*num2) / gcd;
    return lcm;
}

/*
 * Calculate the greatest common denominator of 2 numbers
 * https://en.wikipedia.org/wiki/Euclidean_algorithm 
 */
function getGreatestCommonDenominator(num1, num2) {
    while (num2 != 0) {
        temp = num2;
        num2 = num1 % num2;
        num1 = temp;
    }
    return num1;
}

