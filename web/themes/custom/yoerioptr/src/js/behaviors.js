const initBehaviors = () => {
  const behaviorsCtx = require.context('./behaviors', true, /\.(js|jsx)$/);
  behaviorsCtx.keys().forEach(behaviorsCtx);
};

initBehaviors();
